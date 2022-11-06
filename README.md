# simple_social_network
Simple social network made in Laravel v8.54

Project is done for purpose of applying to a job position for a junior PHP developer

Project functions:
  simple login and register users - laravel ui
  upload images
  search for posts
  pagination
  
The intent was to write an app to use SOLID and DRY principles, but some of the code is repeating on two or more places.
To refactor the code to be more DRY, search function should be extracted from Controller to a separate service class. You could do that for the querying posts created in the past 24 hours too.

