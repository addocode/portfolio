<?php
require __DIR__.'/../lib/FlightStats.php';
$p=parseFlights(file_get_contents(__DIR__.'/../data/Flugdatenbank.md'));$a=json_decode(file_get_contents(__DIR__.'/../data/airports.json'),true,512,JSON_THROW_ON_ERROR);$s=flightStats($p,$a);
function ok($v,$m){if(!$v){fwrite(STDERR,"FAIL: $m\n");exit(1);}echo "OK: $m\n";}
ok(count($s['completed'])===78,'78 durchgeführte Segmente');ok(count($s['planned'])===2,'2 geplante Segmente');ok(count($p['memories'])===2,'Erinnerungen separat');ok(count($s['used'])===48,'48 Flughäfen');ok(abs(distanceKm($a['ZRH'],$a['SIN'])-10300)<500,'Haversine plausibel');
