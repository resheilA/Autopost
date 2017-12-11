# Postaspage-fb
<p>This webware is designed for serving two purpose for facebook posting as page.
<ol>
<li> User can manual post the content on facebook using the application.</li>
<li> User can set a corn job on autopost.php and use the autopost to post links to his/her facebook page.</li>
</ol>
</p>

<h3>Note</h3>
<p>
<b> Please note you need to be the admin of the page to use this application.</b>
</p>

<h1> Getting Access Token </h1>
Following the instructions laid out in Facebook's extending page tokens documentation I was able to get a page access token that does not expire.

I suggest using the Graph API Explorer for all of these steps except where otherwise stated.

0. Create Facebook App

If you already have an app, skip to step 1.

Go to My Apps.
Click "+ Add a New App".
Setup a website app.
You don't need to change its permissions or anything. You just need an app that wont go away before you're done with your access token.

1. Get User Short-Lived Access Token

Go to the Graph API Explorer.
Select the application you want to get the access token for (in the "Application" drop-down menu, not the "My Apps" menu).
Click "Get Token" > "Get User Access Token".
In the pop-up, under the "Extended Permissions" tab, check "manage_pages".
Click "Get Access Token".
Grant access from a Facebook account that has access to manage the target page. Note that if this user loses access the final, never-expiring access token will likely stop working.
The token that appears in the "Access Token" field is your short-lived access token.

2. Generate Long-Lived Access Token

Following these instructions from the Facebook docs, make a GET request to

https://graph.facebook.com/v2.10/oauth/access_token?grant_type=fb_exchange_token&client_id={app_id}&client_secret={app_secret}&fb_exchange_token={short_lived_token}
entering in your app's ID and secret and the short-lived token generated in the previous step.

You cannot use the Graph API Explorer. For some reason it gets stuck on this request. I think it's because the response isn't JSON, but a query string. Since it's a GET request, you can just go to the URL in your browser.

The response should look like this:

{"access_token":"ABC123","token_type":"bearer","expires_in":5183791}
"ABC123" will be your long-lived access token. You can put it into the Access Token Debugger to verify. Under "Expires" it should have something like "2 months".

3. Get User ID

Using the long-lived access token, make a GET request to

https://graph.facebook.com/v2.10/me?access_token={long_lived_access_token}
The id field is your account ID. You'll need it for the next step.

4. Get Permanent Page Access Token

Make a GET request to

https://graph.facebook.com/v2.10/{account_id}/accounts?access_token={long_lived_access_token}
The JSON response should have a data field under which is an array of items the user has access to. Find the item for the page you want the permanent access token from. The access_token field should have your permanent access token. Copy it and test it in the Access Token Debugger. Under "Expires" it should say "Never".




<h1> Editing the Autopost File </h1>
Put everything inside autopost.php.
<li>1. You need access token generated as shown above.</li>
<li>2. Page id from the about of the page on facebook.</li>
<li>3. Appid and Secret from the Application Development on facebook.</li>

<h1> Setting Up the Link </h1>
<li>1. Paste all the links in the links.txt file.</li>
<li>2. Just type in 0 in the linkcounter file.</li>

<h1> Done</h1>
<li> Set up corn to run the autopost.php file as per your requirements and it is ready to boom. Autopost ! </li>


