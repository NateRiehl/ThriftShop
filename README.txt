
Modification History:
CREATED 2/24/16
UPDATED 3/06/16 with new goals
UPDATED 3/07/16. Edited.
UPDATE 3/10/16 CATEGORY table added and shoppingpage changes
UPDATE 3/26/16 Reviews 


Recently Done:
1. Created "profile.php". This is the user's personal page.
	a. Connected partially to database. Still need to do Reviews
	b. Styled profile.php in "css/profileStyle.css"
2. Setup file storage of images for items and profile pictures
	FYI: profile pictures are stored as "email@address.com" + file extension. Example: "imgs/test@test.com.png"
	     Item images are stored using "item id" + "file name" + "extension". Example "11testpants.png"
	a. Also connected this to database
	b. Put file methods in "fileutils.php"
3. Setup email verification upon registration. i.e two accounts can't exist with same email
4. Lots of css all over the place
5. Added CATEGORY table that has attributes itemID and category(varchar). This allows for items to have multiple categories
6. Each shoppingpage item now goes to itempage.php and sends itemID variable. This can be used to generate custom data for each user.
7. In depth item page (itempage.php) basics are done
8. Figure out how to show different content for different user profile page vs their own profile page
9. Made it so certain pages don't display if the user is not logged in. 
10. Set up Review page


NOTES/STEPS of what to do NEXT
.

1. Decide payment handling, etc. 
2. Documentation. One of us needs to go back and better comment each page
4. CSS. Lots of styling left to do. 
5. Bug checking. We should create more test users and see if we see errors.
6. Create a new table with item id's and image links. This will allow for an item to have multiple images
7. Categories
	a. Item's shouldn't show up twice if in two categories
9. Fix Kevin link to pictures to redirect to Nate's imgs folder in shoppingPage.php
10. Seller page shows what items they are selling
11. Only items that are not sold should show up. Items that are sold will have sold label
12. Seller should be able to edit items they are selling 
	a. Mark item as sold and say who bought it

