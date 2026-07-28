<?php
declare(strict_types=1);

final class FlightStats
{
    public static function load(string $markdownFile, string $airportFile): array
    {
        $markdown = file_get_contents($markdownFile);
        $airports = json_decode((string) file_get_contents($airportFile), true, 512, JSON_THROW_ON_ERROR);
        if ($markdown === false) throw new RuntimeException('Flugdatenbank konnte nicht gelesen werden.');

        $status = null; $year = null; $trip = null; $inMemories = false;
        $segments = []; $memories = [];
        foreach (preg_split('/\R/u', $markdown) as $line) {
            if ($line === '## Durchgeführte Flüge') { $status = 'completed'; continue; }
            if ($line === '## Geplante Flüge') { $status = 'planned'; continue; }
            if (str_starts_with($line, '## ')) { $status = null; continue; }
            if (preg_match('/^###\s+(.+)$/u', $line, $m)) {
                $year = preg_match('/\b(20\d{2})\b/', $m[1], $ym) ? (int) $ym[1] : null;
                $trip = $status === 'planned' ? $m[1] : null; $inMemories = false; continue;
            }
            if (preg_match('/^####\s+(.+)$/u', $line, $m)) { $trip = $m[1]; $inMemories = false; continue; }
            if ($line === '**Erinnerungen:**') { $inMemories = true; continue; }
            if (!$status || !preg_match('/^- ([A-Z]{3}) \(([^)]+)\) → ([A-Z]{3}) \(([^)]+)\)(?::\s*(.+))?$/u', $line, $m)) continue;
            if ($inMemories) { $memories[] = ['from' => $m[1], 'to' => $m[3], 'text' => $m[5] ?? '']; continue; }
            $segments[] = ['from'=>$m[1], 'to'=>$m[3], 'fromLabel'=>$m[2], 'toLabel'=>$m[4], 'status'=>$status, 'year'=>$year, 'trip'=>$trip ?: 'Reise'];
        }

        $missing = [];
        foreach ($segments as &$segment) {
            foreach (['from','to'] as $end) if (!isset($airports[$segment[$end]])) $missing[] = $segment[$end];
            if (!isset($airports[$segment['from']], $airports[$segment['to']])) { $segment['distance'] = null; continue; }
            $segment['distance'] = self::distance($airports[$segment['from']], $airports[$segment['to']]);
        } unset($segment);
        if ($missing) throw new RuntimeException('Fehlende Flughafen-Metadaten: '.implode(', ', array_unique($missing)));

        $completed = array_values(array_filter($segments, fn($s) => $s['status'] === 'completed'));
        $planned = array_values(array_filter($segments, fn($s) => $s['status'] === 'planned'));
        $distance = (int) round(array_sum(array_column($completed, 'distance')));
        $usage=[]; $years=[];
        foreach ($completed as $s) { $usage[$s['from']] = ($usage[$s['from']]??0)+1; $usage[$s['to']] = ($usage[$s['to']]??0)+1; $years[$s['year']] = ($years[$s['year']]??0)+1; }
        arsort($usage); ksort($years);
        $usedCodes = array_unique(array_merge(array_column($segments,'from'),array_column($segments,'to')));
        $usedAirports = array_intersect_key($airports, array_flip($usedCodes));
        usort($completed, fn($a,$b) => $a['distance'] <=> $b['distance']);

        return compact('segments','completed','planned','memories','airports','usedAirports','distance','usage','years') + [
            'shortest'=>$completed[0], 'longest'=>$completed[count($completed)-1], 'earths'=>$distance/40075,
        ];
    }

    public static function distance(array $a, array $b): float
    {
        $lat1=deg2rad($a['latitude']); $lat2=deg2rad($b['latitude']);
        $dlat=$lat2-$lat1; $dlon=deg2rad($b['longitude']-$a['longitude']);
        $h=sin($dlat/2)**2+cos($lat1)*cos($lat2)*sin($dlon/2)**2;
        return 6371 * 2 * atan2(sqrt($h), sqrt(1-$h));
    }
}
