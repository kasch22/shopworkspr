# Laravel PHP Framework

This application uses a example data to display the shift times of each staff memeber and the hours and shifts work each day.

## Notes About Application

The most of the application occurs in the 'RotaSlotStaffController'. There is only App View displaying the Shift times and hours worked by each staff over a week.

## Tasks

Part1

  Load the data from the database

  Create a view to display the following output:

  Display the shift times per shift (start and end times) in a data table, (days in columns, staff in rows)

  At the bottom of each day, Show the total number of hours worked on that day.

Part 2

  Calculate and show the number of minutes each day that have been spent with only one member of staff alone.


## Approach

The general approach to this task was to develop a a series of key value pair arrays based on data queried and validated from the MySQL Database. These arrays are then passed to the view for rendering.

The data is rendered using HTML, CSS and Blade tempting. Custom styling has been used to improve readability of the data shown.

Where possible logic and functions have been encapsulated into methods.

Notes have been included in the code to explain coding choices


## Set up

The SQL statements have been loaded into a database called 'shopworkspr' which resides on the a Homestead VM instance.

The Table has been defined as 'rota_slot_staff' in the model class RotaSlotStaff which extends Eloquent ORM.

There is only one table in this database

To use this application please take care name the DB correctly.


## Outcomes and Results

Part 1

  The first part has been completed, the index view of the RotaSlotStaffController shows a table contain the data of the each staff member identified by their staff ID, the days they worked, the hours they worked each day and the shift start and end times

  The table also shows the sum of total hours worked each day by all of the staff members

Part 2

    Unfortunately I was unable to complete this task. I tackled this task in several ways but was unable to determine a solution

    My first attempt took me to get the start times and finish times of shifts. This was semi succesful as it would work for to shifts.

    example:-

    shift_A: Start 9:00, Finish 17:00
    shift_B: Start 10:00, Finish 18:00

    I then compared the start and finish times along the lines of
      if( shift_A->start =< shift_B->start && shift_A->finish => Shift_B->finish)
      {
        This would result in a false with shift_B having an hour on its own.
      }

    However I was unable to advance further than this to include more than 2 shifts at a time.

    My second attempt was to try compare all the shift ends and all the shift starts in serpate arrays in a smular fashions but was unsuccessful.

    I would be very interested in finding out the solution to this problem.

## Thanks

Thanks for the oppurtunity to work on this. I have enjoyed the task.
