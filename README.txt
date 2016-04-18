
Modification History:
CREATED 2/24/16
UPDATED 3/06/16 with new goals
UPDATED 3/07/16. Edited.
UPDATED 3/10/16 CATEGORY table added and shoppingpage changes
UPDATED 3/26/16 Reviews 
UPDATED 4/02/16 Currently selling, addreview, add_review
UPDATED 4/04/16 edititem, edit_item, checkout
UPDATED 4/05/16 categories, item functionality, checkout functionality

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

*******************SINCE LAST MEETING W/ PROFESSOR KIM:*****************

9. Made it so certain pages don't display if the user is not logged in. 
10. Set up Reviews
	a. Reviews can be seen on profile page. Stars corresponding with numgrade
	b. Reviews can be added to other users
11. Only items that are not sold should show up. Items that are sold will have sold label
	a. Added sold attribute to ITEM 
	b. Added a "sold" label that now shows up on sold items in store and itempage
12. Seller page shows what items they are selling
	a. On profile page (unformatted currently)
13. EditItem page is mostly done. 
	a. Users can edit their items and set them as sold
14. Checkout page 
	a. Items can be "bought" and it is said to sold
15. Setup the logout feature (destroy session variables, etc.)
16. "Narrow your Search" ->Categories
	a. Item's don't show up twice if in two categories.
17. Add delete button to edit item.

NOTES/STEPS of what to do NEXT
.
1. Decide if items should be able to have multiple images
2. Format "currently selling" on profile.php
3. More CSS todo
4. Documentation
5. More sample data
6. (Possible) Directory of Users w/ links to their pages.
7. FAVORITES PAGE, add button to item page as well.
8. Fix Foreign Key Constraint on Deletion. ItemID is the parent key to other tables so it is giving me an error upon trying to delete.




