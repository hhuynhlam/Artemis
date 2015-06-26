API Endpoints Supported:
====================

### /index.php/event
Returns a single event or a list of events

Params: 
* id (string)
* event_code (int)
* startDate (int)
* endDate (int)
* limit (int)
* offset (int)


### /index.php/login
Returns a single user

Params: 
* username (string)
* password (string)


### /index.php/member/list
Returns a list of members

Params: 
* select (array)


### /index.php/member/update
Updates a single user

Params: 
* _id (int, **required**)
* phone (string)
* email (string)
* shirtSize (string)
* tempAddress (string)
* permAddress (string)
* password (string)


### /index.php/shift
Returns a list of shifts for an event

Params: 
* event (int, **required**)
* select (array)


### /index.php/shift/signups
Returns a list of signups for a shift

Params: 
* shift (int, **required**)


### /index.php/shift/user/signups/add
Add a user to a shift signup

Params: 
* user (int, **required**)
* shift (int, **required**)
* event (int, **required**)
* driver (int, **required**)
* timestamp (int, **required**)


### /index.php/shift/user/signups/delete
Removes a user from a shift signup

Params: 
* user (int, **required**)
* shift (int, **required**)
* event (int, **required**)


### /index.php/signup/user
Returns a list of signups for a user

Params: 
* id (int, **required**)


### /index.php/waitlist
Returns a waitlist for a shift

Params: 
* shift (int, **required**)


### /index.php/waitlist/add
Add a user to a waitlist

Params: 
* user (int, **required**)
* shift (int, **required**)
* event (int, **required**)
* timestamp (int, **required**)


### /index.php/waitlist/delete
Removes a user from a waitlist

Params: 
* user (int, **required**)
* shift (int, **required**)
* event (int, **required**)
