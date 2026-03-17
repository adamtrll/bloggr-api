# API Goal canvas

| Who | Whats            | Hows                          | Inputs | Outputs | Goals |
| ---| ---------------- | ----------------------------- | ------ | ------- | ----- |
| Admins | Manage topics | Create topic | name | **topic** | Create new topic |
| Visitors | Authenticate     | Users register on the website | email, password       | Auth token        | Create new profile |
| Visitors | Authenticate     | Users login to the website    | credentials       | Auth token        | Authenticate user       |
| Users | Manage profile | Edit profile | name, email, bio | **profile** | Update existing profile |
| Users | Manage profile | Delete profile | **profile** | - | Delete existing profile |
| Visitors | Get profile details | Get profile details | **profile** id | **profile**, profile metrics | Get details of a profile |
| Users | Create new post  | List all topics               | -        | **topic** list        | Get available topics |
| Users | Create new post  | Publish post                  | title, description, content, **topic** | **post** | Publish new post |
| Users | Manage posts     | List all posts               | -        | **post** list        | Get all posts by the user |
| Users | Manage posts     | Edit post | title, description, content, **topic** , **post** | **post** | Update existing post |
| Users | Manage posts     | Delete post | **post** | - | Delete existing post |
| Visitors | Get post details | Get post details | **post** id | **post** | Get details of a post |
| Visitors | See post comments | List comments | **post**       | **comment** list        | Get all comments for a post |
| Users | Comment on posts | Create comment                | message, **post**       | comment        | Post new comment      |
| Users | Manage comments   | Edit comment | message, **comment** | **comment** | Update existing comment |
| Users | Manage comments   | Delete comment | **comment** | - | Delete existing comment |
| Users | Reply to comments | Create comment on comment | message, **comment** | **comment** | Reply to existing comment |
| Users | Follow other profiles | Follow profile | **profile** | - | Follow other profile |
| Users | Unfollow other profiles | Unfollow profile | **profile** | - | Unfollow other profile |
| Visitors | See post feed | List most recent posts | search query | **post** list | Get most recent posts |
| Visitors | See post feed | List most popular posts | search query | **post** list | Get most popular posts |
| Users | See post feed | List followed profile posts | search query | **post** list | Get posts made by followed profiles |
| Visitors | See post feed | List posts by topic | **topic**, search query | **post** list | Get posts by topic |
