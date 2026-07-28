# Flight Stats

Dieses Verzeichnis enthält das vollständige, eigenständige Reise-Logbuch.

## Struktur

```text
flight-stats/
├── index.php                  # Öffentliche Seite unter /flight-stats/
├── data/
│   ├── Flugdatenbank.md       # Kanonische Quelle für alle Flugsegmente
│   └── airports.json          # Lokale Metadaten und Koordinaten der Flughäfen
├── lib/
│   └── FlightStats.php        # Markdown-Parser und Statistiklogik
├── assets/
│   ├── css/travel.css         # Modul-spezifisches Design
│   └── js/travel.js           # Interaktive Weltkarte und Filter
└── tests/
    └── flight_stats_test.php  # Regressionstests
```

## Flugdaten pflegen

`data/Flugdatenbank.md` ist die einzige Quelle für Flugsegmente. Neue Einträge werden unter `Durchgeführte Flüge` oder `Geplante Flüge` im vorhandenen Routenformat ergänzt. Jahres- und Reiseüberschriften bleiben als Gruppierung erhalten. Kennzahlen, Chronik und Karte werden bei jedem Seitenaufruf automatisch neu berechnet.

Jeder neue IATA-Code benötigt zusätzlich einen Eintrag in `data/airports.json` mit Name, Ort, ISO-Ländercode, Breitengrad und Längengrad. Die derzeitigen Koordinaten stammen aus dem frei verfügbaren OurAirports-Datensatz (Abruf: 28.07.2026). Fehlt ein Code, bricht der Parser bewusst mit einer eindeutigen Meldung ab, statt eine falsche Distanz zu liefern. `NOU` (La Tontouta) und `GEA` (Magenta) werden getrennt behandelt.

## Lokal testen

Vom Repository-Root:

```bash
php flight-stats/tests/flight_stats_test.php
php -S localhost:8000
```

Danach ist die Seite unter <http://localhost:8000/flight-stats/> erreichbar.
