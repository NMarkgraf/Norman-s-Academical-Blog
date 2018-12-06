+++
# Project title.
title = "RmdStyleChecker"
active = true

# Date this page was created.
date = "2017-02-10T00:00:00"

# Project summary to display on homepage.
summary = "Python Script zum Überbrüfen von Style Guidelines von R markdown Dokumenten"

# Tags: can be used for filtering projects.
# Example: `tags = ["machine-learning", "deep-learning"]`
tags = ["R", "R markdown", "Python"]

# Optional external URL for project (replaces project detail page).
external_link = "https://github.com/NMarkgraf/RmdStyleChecker"

# Slides (optional).
#   Associate this project with Markdown slides.
#   Simply enter your slide deck's filename without extension.
#   E.g. `slides = "example-slides"` references 
#   `content/slides/example-slides.md`.
#   Otherwise, set `slides = ""`.
#slides = "example-slides"

# Links (optional).
url_pdf = ""
url_slides = ""
url_video = ""
url_code = ""

# Custom links (optional).
#   Uncomment line below to enable. For multiple links, use the form `[{...}, {...}, {...}]`.
#url_custom = [{icon_pack = "fab", icon="twitter", name="Follow", url = "https://twitter.com/georgecushen"}]

# Featured image
# To use, add an image named `featured.jpg/png` to your project's folder. 
[image]
  # Caption (optional)
  caption = "Photo by rawpixel on Unsplash"
  
  # Focal point (optional)
  # Options: Smart, Center, TopLeft, Top, TopRight, Left, Right, BottomLeft, Bottom, BottomRight
  focal_point = "Smart"
+++

Jede Sprache hat Regeln, auch Programmiersprachen und R markdown ist eine Programmiersprache. Wieso also nicht ein Tool schreiben, welches *SStilregeln* (engl. *style guides*) für R markdown kontrolliert um auch im kolaborativen Einsatz ein einheitliches "Schriftbild" des Quelltextes zu erhalten. 

...

Einen ersten Schritt habe ich mit dem [Blog-Eintrag](auch-rmarkdown-dateien-sollten-sich-regeln-halten) gemacht und dazu gleich noch ein Tool in *Python* geschrieben um Verstöße dagegen schneller zu finden.