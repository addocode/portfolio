<?php
require __DIR__.'/../lib/FlightStats.php';
$data=FlightStats::load(__DIR__.'/../data/Flugdatenbank.md', __DIR__.'/../data/airports.json');
function check(bool $ok, string $message): void { if (!$ok) { fwrite(STDERR,"FEHLER: $message\n"); exit(1); } echo "✓ $message\n"; }
check(count($data['completed'])===78, '78 durchgeführte Segmente erkannt');
check(count($data['planned'])===2, '2 geplante Segmente erkannt');
check(count($data['memories'])===2 && count($data['segments'])===80, 'Erinnerungen nicht als Segmente gezählt');
$codes=array_unique(array_merge(array_column($data['segments'],'from'),array_column($data['segments'],'to')));
check(count($codes)===48 && !array_diff($codes,array_keys($data['airports'])), 'alle 48 IATA-Codes besitzen Metadaten');
$zrh=['latitude'=>47.4581,'longitude'=>8.5555]; $sin=['latitude'=>1.3502,'longitude'=>103.994];
$distance=FlightStats::distance($zrh,$sin); check($distance>10200 && $distance<10400, 'Grosskreisdistanz ZRH–SIN plausibel');
