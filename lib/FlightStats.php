<?php
declare(strict_types=1);
function parseFlights(string $markdown): array {
    $status=null;$year=null;$trip=null;$memories=false;$segments=[];$notes=[];
    foreach(preg_split('/\R/', $markdown) as $line){
        if($line==='## Durchgeführte Flüge'){$status='completed';$memories=false;continue;}
        if($line==='## Geplante Flüge'){$status='planned';$memories=false;continue;}
        if(str_starts_with($line,'## ')){$status=null;continue;}
        if(preg_match('/^### (.+)$/',$line,$m)){$year=preg_match('/\d{4}/',$m[1],$y)?(int)$y[0]:null;$trip=$m[1];$memories=false;continue;}
        if(preg_match('/^#### (.+)$/',$line,$m)){$trip=$m[1];$memories=false;continue;}
        if($line==='**Erinnerungen:**'){$memories=true;continue;}
        if(preg_match('/^- ([A-Z]{3}) \(([^)]+)\) → ([A-Z]{3}) \(([^)]+)\)(?:: (.+))?$/u',$line,$m)){
            $row=['from'=>$m[1],'from_name'=>$m[2],'to'=>$m[3],'to_name'=>$m[4],'year'=>$year,'trip'=>$trip,'status'=>$status];
            if($memories){$row['note']=$m[5]??'';$notes[]=$row;} elseif($status){$segments[]=$row;}
        }
    } return ['segments'=>$segments,'memories'=>$notes];
}
function distanceKm(array $a,array $b): float {$r=6371;$p1=deg2rad($a['lat']);$p2=deg2rad($b['lat']);$dp=deg2rad($b['lat']-$a['lat']);$dl=deg2rad($b['lon']-$a['lon']);$h=sin($dp/2)**2+cos($p1)*cos($p2)*sin($dl/2)**2;return 2*$r*asin(min(1,sqrt($h)));}
function flightStats(array $parsed,array $airports): array {
 $completed=array_values(array_filter($parsed['segments'],fn($s)=>$s['status']==='completed'));$planned=array_values(array_filter($parsed['segments'],fn($s)=>$s['status']==='planned'));$used=[];$counts=[];$years=[];$total=0;$enriched=[];
 foreach($parsed['segments'] as $s){foreach(['from','to'] as $k){if(!isset($airports[$s[$k]]))throw new RuntimeException('Fehlende Flughafen-Metadaten: '.$s[$k]);$used[$s[$k]]=1;$counts[$s[$k]]=($counts[$s[$k]]??0)+1;}$s['distance']=distanceKm($airports[$s['from']],$airports[$s['to']]);if($s['status']==='completed'){$total+=$s['distance'];$years[$s['year']]=($years[$s['year']]??0)+1;}$enriched[]=$s;}
 $done=array_values(array_filter($enriched,fn($s)=>$s['status']==='completed'));usort($done,fn($a,$b)=>$a['distance']<=>$b['distance']);arsort($counts);ksort($years);return compact('completed','planned','used','counts','years','total','enriched')+['shortest'=>$done[0],'longest'=>$done[count($done)-1]];
}
