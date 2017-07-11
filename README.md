# Time-Tracking-App
Simple Time Tracking App with Ajax
## Task:
Entering the base route of application, should reveal page where user can do following actions:
* See all logs, logged before
* Have a form to add new time log 

All time logs should go in descending order, starting from now and should be grouped visually by days. Also, please paginate the results.  
One time log record should be displayed as a line of text with reason for time log, time spent for that and datetime when this log was made. 
 
Form to add a new time log should contain two fields ­ time log description and time spent field. Form submission should happen by AJAX and new time log entry should be added to display right away. If, after adding a new time log entry, amount of time logs displayed on the page is bigger than pagination, then all of the records, that shouldn’t be on the page, should be gone from the page. 
