---
title: Moderator und Mediation - Formen der Interaktion bei Analyse von Zusammenhängen
author: admin
date: '2019-12-31'
slug: moderator-und-mediation-formen-der-interaktion-bei-analyse-von-zusammenhängen
categories:
  - Statistik
tags:
  - Statistik
subtitle: ''
summary: ''
authors: []
lastmod: '2019-12-31T13:33:45+01:00'
featured: no
image:
  caption: ''
  focal_point: ''
  preview_only: no
projects: []
---

Bei der Analyse von Zusammenhängen tauchen sowohl *Moderation* als auch *Mediation* auf. Es geht um Zusammenhänge zwischen drei Variablen `\(X\)`, `\(Y\)` und `\(M\)`. 
Untersucht wird der Effekt einer unabhägigen Variable `\(X\)` (*Prädiktor*, *UV*) auf ein abhängige Variable `\(Y\)` (*AV*). 
Wir untersuchen dies mit einem Regressionsmodell `\(Y ~ X\)`. 
Dabei wird zusätzlich eine dritte Variable `\(M\)` berücksichtigt, die man entweder der *Moderator* oder *Mediator* nennt.

Ist die abhängige Variable metrisch, so können wir mittels eine linearer Regression vorgehen, ist die AB dagegen dichotom, so nutzen wir eine logistische Regression.

## Moderation

Bei einer *Moderation* wirkt die dritte Variable `\(M\)` (*Moderator*) auf die Beziehung zwischen `\(X\)` und `\(Y\)`.

Der Einfluss von `\(M\)` ändert also den Effekt von `\(X\)` auf `\(Y\)`. Der Zusammenhang zwischen `\(Y\)` und `\(X\)` ist also je nach `\(M\)` unterschiedlich.

Statistisch gesehen liegt eine *Interaktion* zwischen `\(M\)` und `\(X\)` vor. 

### Wie untersucht man einen Zusammenhang auf eine Moderation?

Dazu stellen wir ein Regressionsmodell mit den drei Faktoren `\(X\)`, `\(M\)` und der Interaktion zwischen `\(X\)` und `\(M\)` auf.


```r
lm(Y ~ X * M, data=daten)
```

Oder alternativ:


```r
lm(Y ~ X + M + M:X, data=daten)
```


Diese drei Faktoren wirken auf `\(Y\)`. Ist in diesem Modell die Interaktion `\(M:X\)` *signifikant*, so liegt eine (signifikante) *Moderation* vor.


## Mediation

Bei der *Mediation* steht die Variable `\(M\)` (der *Mediator*) sowohl zu `\(X\)` als auch zu `\(Y\)` in Beziehung.
Der direkte Effekt zwischen `\(X\)` und `\(Y\)` wird durch den indirekten Effekt über `\(M\)` erklärt, also durch 
`\(X \to  M \to Y\)`.

### Wie untersucht man auf eine Mediation?

In diesem Fall stellen wir mehrere Regressionsmodelle auf. Eine (signifikante) Mediation liegt dann vor, wenn die folgenden Bedinungen erfüllt sind:


```r
erstesModell <- lm(Y ~ X, data=daten)
zweitesModell <- lm(M ~ X, data=daten)
drittesModell <- lm(Y ~ X + M, data=daten)
```


1. Im ersten Modell ($X \to Y$) ist der Regressionskoeffizient von `\(X\)` signifikant.

2. Im zweiten Modell ($X \to M$) ist der Regressionskoeffizient von `\(X\)` signifikant.

3. Im dritten Modell ($X,M \to Y$) ist der Regressionskoeffizient von `\(M\)` signifikant und 

4. der Regressionskoeffizient von `\(X\)` im dritten Modell kleiner als im ersten Modell.


