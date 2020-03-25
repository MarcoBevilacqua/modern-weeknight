# MarcoBevilacqua-modern-weeknight
A simple ugly lines parser and beautifier

This project was born for a specific issue in a website restyle. 

There were a lot of messy and not-formatted lines, each one is a potential data row with a lot of information inside

My goal is to find a way of order, parse and extract data from each one of these lines, and put that data in a structure

# ALREADY DONE
- file parse
- returning indexed lines in array
- escape empty row
- parse specific line parts 

# TODO
- extend regex patterns to the user's choice
- include react (or another) frontend template to: 
  - accomplish user interaction (e.g. the user can select or type a combination of chars to be parsed)
  - beautify user interface
  - provide excerpt of parsing result before submit
