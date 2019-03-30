# REST API - PedalPay

Current Host URL:- http://www.matthewfrankland.co.uk/

All examples return a JSON encoded response containing a message and an error flag. All request contain an error flag and a return message. The message will contain either a string or an array.

## Endpoints Requiring Authentication

### Update Profile Photo
`POST /pedalPay/profilePictures/uploadPhoto.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Email User Wishes To Register With | 'error' | Boolean |
| 'password'| Password User Wishes To Register With | 'messaage' | String |
| 'picture' | base64 Encoding Of Picture - Maximum Size Of 512px x 512px |||

When checking if a user has a profile picture set call `/pedalPay/profilePictures/'users id from database'.jpg`. If a 404 error then set to a standard local default image.

### User Login; Standard Registration; & Reset Password
##### Login
`POST /pedalPay/login/login.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| | | 'admin' | Bool |

##### Register
`POST /pedalPay/login/register.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Email User Wishes To Register With | 'error' | Boolean |
| 'password'| Password User Wishes To Register With | 'messaage' | String |
| 'name' | Name Of User |||
| 'dob' | Date of Birth In Standard mySQL Date And Time Format |||
| 'addressone' | Address Line 1 |||
| 'addresstwo' | Address Line 2 (Leave Blank If Not Needed) |||
| 'city' | City Of User |||
| 'zip' | Zip Code Of User |||

##### Reset Password**
`POST /pedalPay/resetPass/emailReset.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| | | 'messaage' | String |

### Administrator Functions
##### Get User Details
`POST /pedalPay/adminFunctions/userDetails.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | Array |

##### Get Bike Damage
`POST /pedalPay/adminFunctions/bikeStatus.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'bid' | ID Of Bike Request | | |

##### Change Bike Status
`POST /pedalPay/adminFunctions/changeBikeStatus.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'bid' | ID Of Bike Request | | |
| 'status' | New Status Code {From Enum Else NULL} | | |


##### Get Bike Updates
`POST /pedalPay/adminFunctions/bikeUpdates.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | Array |
| 'bid' | ID For Bike That Updates Are Requested For | | |

##### Get All User Bookings
`POST /pedalPay/adminFunctions/allUserBookings.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | Array |

##### Insert New Bike Location Tag
`POST /pedalPay/adminFunctions/updateLocation.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'bid' | Bike ID Sending Update | | |
| 'lat' | New Latitude of Bike | | |
| 'long' | New Longitude of Bike | | |

##### Returns Send Location Updates For A Given Booking
`POST /pedalPay/adminFunctions/locOfBike.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'bid' | Booking ID | | |

##### Administrator Registration
`POST /pedalPay/adminFunctions/adminRegister.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Email Administrator Wishes To Register With | 'error' | Boolean |
| 'password' | Password Administrator Wishes To Register With | 'messaage' | String |
| 'name' | Name Of Administrator |||
| 'age' | Age Of Administrator |||
| 'dob' | Date of Birth In Standard mySQL Date And Time Format |||
| 'addressone' | Address Line 1 |||
| 'addresstwo' | Address Line 2 (Leave Blank If Not Needed) |||
| 'city' | City Of Administrator |||
| 'zip' | Zip Code Of Administrator |||
| 'adminEmail' | Pre-Registered Administrator's Log-In Email For Registration Approval | | |
| 'adminPassword' | Pre-Registered Administrator's Log-In Password For Registration Approval | | |

### Customer Functions
##### Get Bike Locations
`POST /pedalPay/userFunctions/locations.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
|  |  | 'error' | Boolean |
|  |  | 'messaage' | Array |

##### Return Bike Code Using NFC
`POST /pedalPay/userFunctions/unlock.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'bikeStand' | String In Format City ID Concatenated With Hub Location Name |||

##### Hub Latitude and Longitude
`POST /pedalPay/userFunctions/hubLatLong.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'lid' | String of Hub's ID |||

##### Make A Booking
`POST /pedalPay/userFunctions/makeBooking.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | Array |
| 'bookStart' | Start Time and Date For Booking In Standard mySQL Date And Time Format | 'code' | Int |
| 'bookEnd' | End Time and Date For Booking In Standard mySQL Date And Time Format |||
| 'hub' | Full String Of Hub Location Name |||
| 'bikeType' | Full String of Bike Type |||

##### Checkout An Accessory
`POST /pedalPay/userFunctions/checkoutAccessory.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'hub' | Full String Of Hub Accessory Is To Be Checked Out From |||
| 'item' | String Of Accessory In All Lower Case Letter With No Special Characters |||

##### Remove a Booking
`POST /pedalPay/userFunctions/removeBooking.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'bookID' | ID From Bike Booking In Database Returned During CheckOut |||

This function is delayed 1 hour before processing to simulate bike being moved back to normal position.

##### Checkin An Accessory
`POST /pedalPay/userFunctions/checkinAccessory.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'accessoryID' | ID Of Accessory That Has Been Checked Out |||

##### Get A User's ID
`POST /pedalPay/userFunctions/userID.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |

##### Get All Reviews
`POST /pedalPay/userFunctions/getReview.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |

##### Set A Review
`POST /pedalPay/userFunctions/setReview.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | User's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'rating' | Int Number For Rating |||
| 'text' | Full Text Of Review (Max 1024 Chars) |||

##### Get User Bookings
`POST /pedalPay/userFunctions/getBookings.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'email' | Administrator's Registered Email Address | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | Array |

##### Update Customer's Details
`POST /pedalPay/userFunctions/updateDetails.php`

| Parameter | Parameter Explanation | Return | Return Type* |
| ------------- | ------------- | ----- | ----- |
| 'oldEmail' | Email Currently Set To User For Login and Not An Email For Updating | 'error' | Boolean |
| 'password' | Password Attempt | 'messaage' | String |
| 'newEmail' | Email To Update - Set To Empty If No Update Required |||
| 'name' | Name To Update - Set To Empty If No Update Required |||
| 'dob' | DOB To Update (Must Be In SQL Format) - Set To Empty If No Update Required |||
| 'mobile' | Mobile Number Of Any Length (So Up To You About International Code) - Set To Empty If No Update Required |||
| 'addressOne' | Address Line One To Update - Set To Empty If No Update Required |||
| 'addressTwo' | Address Line Two To Update - Set To Empty If No Update Required |||
| 'city' | City To Update - Set To Empty If No Update Required |||
| 'zip' | Zip To Update - Set To Empty If No Update Required |||

*{Within JSON Object}<br />
**{This Sends E-Mail To Given Address Only If User Is Registered - This Is Not Shown In Return String}<br />
