=================== Implement if you have time ==============

while uploading cover,profile image, cropping part implementation

to implement video preview in attach files in postmodal

while attaching many photos in post creation, X+ more images . Implementing this feature

> file name , so that no one can guess. in ideal world, the private url are private actually, 
reading from file system. Without having proper access, no one can access this url 

> file name in attachment, if it becomes big, it overflows the attachment area. 

> for above 1 G post, validation message is not working. Zura sugggested to increase max post size little 
bit more.

> when I open attachments of posts, when I click right or left arrow button, if I reach the last 
attachment, then I will make the arrow more unclear so that, user can understand, its the last 

> Making dedicated page for a post on comment delete notification to show 

> lec 35, learning the queries deeply , clearly

> follow back when the followers already following me. 

> There are no comments, this comment will only show when there are totally no comments, not 
in sub comments 

====================== To fix ===================

preview link exceeded the div
default avatar kabahiamge removing



================ Commands used in this project =============

php artisan make:migration add_parent_id_to_comments

php artisan make:controller GroupController --model=Group --api --requests --resource

php artisan make:resource GroupResource

php artisan make:notification InvitationInGroup

php artisan make:resource GroupUserResource

php artisan make:migration add_preview_column_to_posts_table

php artisan make:migration add_pinned_column_to_posts_table

php artisan make:migration add_pinned_post_id_column_to_groups_and_users_tables

php artisan make:migration add_foreign_key_on_comments_table_for_parent_id

==================== Further investigation ==============
Lec: 34. Load more functionality. 1:04:00
Data object chilo or Arrray, it doesn't 


================== tasks, to do from moving project ==================
- removing node_modules, vendor folder
- direct copy -> destination folder
- removing docker yml file,  etc
- composer install, npm intall
- db connection 
- username, pass blank,port, db creation from tableplus
- php artisan migrate 
- all tables will be in the databse
- mailtrap connection, pass copy using the copy button
- all ok now.
