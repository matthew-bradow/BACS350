### Design.md

## Data Models
* All data is stored in the database.
### Notes
* id - int - Primary Key
* title - varchar(100)
* body - text
* date - date
### Slides
* id - int - Primary Key
* title - varchar(255)
* body - varchar(1023)
### Superhero
* id - int - Primary Key
* name - varchar(100)
* aka - varchar(100)
* image - varchar(100)
* description - text
### Administration
* id - int - Primary Key
* email - varchar(255)
* password - varchar(255)
* firstName - varchar(60)
* lastName - varchar(60)
### Reviews
* id - int - Primary Key
* designer - varchar(100)
* url - varchar(200)
* report - text
* score - int
* date - date
### Log
* id - int - Primary Key
* date - varchar(100)
### Subscribers
* id - int - Primary Key
* name - varchar(100)
* email - varchar(100)

## Views
* All pages will be built with Standard views.
* List
* Detail
* Edit
* Add
* Delete

## Design Patters
* Design Patterns
* Page Render Pattern
* Template Render Pattern
* Logging Pattern
* Core Views Pattern
* CRUD Pattern
* Database Connection Pattern
* MVC Pattern
* Variable Injection Pattern
* User Auth Pattern

