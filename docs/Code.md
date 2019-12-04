### Code.md
* Implementation plan
* Code milestones
* Schedule for tracking progress


### Design Patterns

To complete this project you must use the following design patterns

* Views
    * Render Page
    * Render Cards
    * List view
    * Add view
    * Update view
    * Markdown display view
    * Slide show view with Reveal JS
* Data
    * Create MySQL database
    * Connect to database from PHP
    * List records in database
    * Add records to database
    * Edit records in database
    * Read document


## Milestones

### Milestone 1 - App Plan
* Requirements.md - Top 10 requirements
* Design.md - design for Data and View
    * Data - records and fields (rows and columns)
    * SQL - create table code and database connection settings
    * CRUD functions - CREATE, READ, UPDATE, DELETE
    * Views - List, Detail, Add, Edit, Delete


### Milestone 2 - App Database
* Database created at Bluehost
* Database tables created
* Database connected to PHP pages


### Milestone 3 - Add and List Records
* Application loads with index.php
* Show a list of records
* Add one record using forms input
* PHP file contains code to handle each datatype
* Views are created with templates
* Caching of pages is prevented to allow changes to show immediately


### Milestone 4 - Edit Records
* Edit records from the list
* Use form to modify record fields
* Records can be deleted
* PHP file contains code to handle each datatype
* Views are created with templates
* Caching of pages is prevented to allow changes to show immediately


### Milestone 5 - Logging
* Each page load is logged
* Each record modified or created is logged
* log-history.php shows the system log for this application


### Milestone 6 - Slide Show
* Start with the Reveal JS slide show 
* Selecting a record play the slides
* Slide show appears in another browser tab
* Polish and refine


### Milestone 7 - Code Review
* Start with the Code Review Checklist 
* List of defects is created
* Score the requirements that are met

## Refactoring

The Brain App contains a number of different components.  Each of these was created in isolation and
combined into the larger app.

Extensive refactoring is needed to eliminate the code duplication.  Here is the order of refactorings that are planned.

* Create views.php in "/bacs350/lib"
* Setup styles.css in "/bacs350/lib"
* Create templates directory for HTML files in "/bacs350/templates"
* Move existing templates into "/bacs350/templates"
* Convert home page to use Page Render design pattern
* Create auth.php in "/bacs350/lib"
* Create db.php in "/bacs350/lib"
* Create log.php in  "/bacs350/lib"
* Show log history using "/bacs350/logpage.php"
* Convert all pages to use "/bacs350/lib/views.php"
* Use code generator to convert each component
    * Documents
    * Notes
    * Slides
    * Planner
    * Reviewer
    * Subscribers
    * Superhero
* Delete all extra files


