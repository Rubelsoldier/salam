========= Implement if you have time ======
while uploading cover,profile image, cropping part implementation

to implement video preview in attach files in postmodal

while attaching many photos in post creation, X+ more images . Implementing this feature

> file name , so that no one can guess. in ideal world, the private url are private actually, 
reading from file system. Without having proper access, no one can access this url 

> file name in attachment, if it becomes big, it overflows the attachment area. 

> for above 1 G post, validation message is not working. Zura sugggested to increase max post size little 
bit more.

====== To fix =====
My profile details updated commit, need to fix the notificaiton bar. It's not 
disappearing. 

deleting comment and its sub comments doesn't decrease total comment number 

deleting post is not working 

In a group, invite user button modal, cancel button is not working. 

================ Commands used in this project =============
php artisan make:migration add_parent_id_to_comments

php artisan make:controller GroupController --model=Group --api --requests --resource

php artisan make:resource GroupResource

php artisan make:notification InvitationInGroup