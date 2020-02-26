---
title: Docker per Homebrew auf dem alten Mac
author: admin
date: '2020-02-24'
slug: docker-per-homebrew-auf-dem-alten-mac
categories:
  - Allgemeines
tags:
  - docker
  - homebrew
  - mac
subtitle: ''
summary: ''
authors: []
lastmod: '2020-02-24T19:51:20+01:00'
featured: no
image:
  caption: ''
  focal_point: ''
  preview_only: no
projects: []
---


Mein alter mac, ein iMac (27 Zoll, Mitte 2011) mit macOS Cataline 10.13.6 (17G11023), kann leider nicht mehr alle Programme über das Systemupdate ziehen. Auch einige Software-Produkte laufen nicht mehr direkt von Hersteller.

Daher nutze ich seit einiger Zeit [homebrew](https://brew.sh/index_de) um fehlende Produkte dennoch auf meinem Rechner zu installieren.

Hier nun mein Versuch mit docker:

### Erster Schritt

Mittels
```
> brew update
```
habe ich die aktuellen Dateien für brew auf den neusten Stand gebracht.

Eine alte Version von Docker habe ich gelöscht, da

```
ls -al /Application/Docker
```

eine alter Version angezeigt hat, habe ich diese mit dem Finder aus dem Programme Ordner in den Mülleimer gezogen.
```
> /Applications/Docker.app/Contents/MacOS/Docker --uninstall
```

### Zweiter Schritt

Nun die docker mit Hilfe von brew auf dem Rechner 'brauen':

```
> brew cask install docker
```

### Dritter Schritt


Dem Rezept hier https://medium.com/@yutafujii_59175/a-complete-one-by-one-guide-to-install-docker-on-your-mac-os-using-homebrew-e818eb4cfc3 folgend, habe ich eine Docker installation dann doch noch geschafft.
