---
title: Raspbian auf dem Raspberry Pi installieren
author: Norman Markgraf
date: '2019-01-02'
slug: raspbian-auf-dem-raspberry-pi-installieren
categories:
  - Fundstücke
tags:
  - Raspberry Pi
  - Raspbian
image:
  caption: ''
  focal_point: ''
---

Wenn man zu Weihnachten einen kleinen neuen Freund bekommt, so wie ich einen Raspberry Pi Zero WH, dann möchte man ihn auch mit der aktuellen Version eines Betriebssystems austatten. Als macOS Nutzer gibt es dafür viele Möglichkeiten. Hier meine Schritte bei der Installation, damit ich mich daran später erinnere

## Vorbereiten der SD Karte

Die SD(HC) Karte sollte auf FAT32 formatiert werden. Das geht unter macOS sehr schön mit dem Festplattenmanager!

## Laden der aktuellen Version von Rasbian

Die aktuellen Versionen findet man unter https://www.raspberrypi.org/downloads/raspbian/. Es ginge auch alternativ NOOBS, aber da ich "headless" installieren möchte, wähle ich Raspbian direkt aus.

Die ZIP-Datei wird entpackt (Archiveprogramm) und wir befinden uns mit der Konsole in dem Verzeichnis in dem das aktuelle Image liegt.

Zur Zeit dieses Eintrages war das die Datei "2018-11-13-raspbian-stretch-full.img"


### Speichern des Images auf die SD Karte

Mit Hilfe von 

```
diskutil list
```

ermittelt man die SD Karte (hier "/dev/disk5") und mit Hilfe von

```
diskutil unmountdisk /dev/disk5
```

wird die SD Karte komplett "unmounted".


Nun kann man mit 

```
sudo dd bs=1m if=2018-11-13-raspbian-stretch-full.img of=/dev/disk5 conv=sync
```

das Image auf die SD Karte gespeichert. Das kann etwas dauern! (Bis zu 30 Minuten!) 
Mit "ctrl-t" kann  man sich regelmässig über der aktuellen Stand informieren! ;-)


### Netzwerk einrichten

Nach dem man das Image auf die SD Karte gespeichert hat wirft man die SD Karte aus und steckt sie danach wieder ein. Damit hat man die SD Karte wieder "gemounted" und wir finden unter "/Volues/boot" und Boot-Verzeichnis der SD-Karte. 

In diesem Verzeichnis erzeigen wir (z.B. mit *vi*) eine Datei mit dem Namen "wpa_supplicant.conf" mit dem Inhalt:

```
country=DE
ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev
update_config=1

network={
    ssid="YOUR_NETWORK_NAME"
    psk="YOUR_PASSWORD"
    key_mgmt=WPA-PSK
    scan_ssid=1
}
```

Diese Datei wird beim Booten von Rasbpian in das Verzeichnis "/etc/wpa_supplicant/" verschoben.

### SSH aktivieren!

SSH ist in der Regel deaktiviert. Wir können es aber schnell einschalten. Dafür gehen wir wieder in das Verzeichnis "/Volumes/boot" und führen dort den Befehl

```
touch ssh
```

aus. Damit wird eine (leere) Datei "ssh" erzeugt. Findet Raspbain diese Datei, so aktiviert es beim Booten automatisch den SSH-Dämon.


### Starten von der neuen SD Karte

Jetzt kann die Karte ausgeworfen werden und in den Raspberry eingelegt werden. Danach kann von der SD Karte gestartet werden.