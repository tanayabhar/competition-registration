# competition-registration
This is a registration plugin for any competition or event.

The workflow is as follows

1. Competition - Post type with title, description & image
2. Entry - post type with custom field 
    - First Name
    - Last Name
    - Email
    - Phone
    - Description
    - Competition ID
3. Competition has a listing page and a single page.
4. On detail page of competition, there is a “Submit Entry” button. Clicking on button there will be a “Submit Entry” page with URL structure of:
{siteURL}/competition-slug/submit-entry
5. On the "Submit Entry" page, there is a form with the following fields:

    - First Name
    - Last Name
    - Email
    - Phone
    - Description
    6. User will submit the form. submitted entries will  be inserted to “Entries” post type with corresponding meta fields along with competition ID.