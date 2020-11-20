# WordPress Base Build

## Starting a New Project

### Method 1: Download Zip

- Click the "Clone or download" button in GitHub and choose Download Zip
- Extract the folder into your Sites directory, rename the folder to your current project name. (i.e. lloydcompanies.com)

### Method 2: Clone Each Time

- Navigate to your `Sites` directory in a terminal window
- `git clone git@github.com:c1-partners/wordpress-base-build.git projectname.com`
- Navigate into the root directory of your new site and run `rm -rf .git` to remove the attachment to the `wordpress-base-build` repository. *THIS IS AN IMPORTANT STEP*

### Method 3: Clone and Maintain Local

- Navigate to your `Sites` directory in a terminal window
- `git clone git@github.com:c1-partners/wordpress-base-build.git`

This is now you base local repository, when actually creating a new project:

- Navigate to the `wordpress-base-build` directory and pull changes from github
- Back up to the `Sites` directory and run `cp -R wordpress-base-build projectname.com`
- Navigate into the root directory of your new site and run `rm -rf .git` to remove the attachment to the `wordpress-base-build` repository. *THIS IS AN IMPORTANT STEP*

### Clean up steps pre Initial Commit

- Navigate to the `/src/wp/wp-content/themes` directory and update the `wordpress-base-build` theme according to your new project name (i.e. lloydcompanies)
- Open the `style.css` file in the root of your new theme directory and update the `Theme Name` and `Description` fields
- Create a png image with a file name `screenshot.png` with dimensions of 1200px x 900px, using the main website logo, or the most appropriate thing to the project (optional)

### Initializing the new GitHub repository

- Create your new repository in GitHub.
    + If possible, the domain of the project, without the TLD (.com, .org, etc | i.e. lloydcompanies).
    + Set the description accordingly (i.e. Lloyd Companies Website)
    + Set as Private
    + Leave the "Initialize this repository with a README" checkbox unchecked, as the folder already contains a README.md
    + Leave "Add .gitignore: None" as is.
    + Leave "Add a license: None" as is.
- Navigate your browser to the GitHub repository, and grab the SSH clone link from the "Clone or download" button.
- Navigate to the root directory of your new project directory and run:
    + `git init`
    + `git remote add origin *sshcloneurl*`
    + `git add .`
    + `git commit -am "Initial Commit"`
    + `git push -u origin master`



## Compiling Assets

- Make sure that the Node modules have been installed: `npm i`
- To run a single compile for development: `npm run dev`
- To run a single compile for production: `npm run production`
- To run a compile watcher: `npm run watch`

Running the production compile will minify all the assets. Before pushing code to master with the intent to deploy, run `npm run production` as your last compile.


## JS Libraries

| Package | File | Active by Default | Version |
| :------ | :--- | :---------------- | :------ |
| [Bootstrap](http://getbootstrap.com/) | /src/assets/js/vendor/bootstrap.min.js | Yes | 4.1.0 |
| [Images Loaded](https://imagesloaded.desandro.com/) | /src/assets/js/vender/imagesloaded.pkgd.min.js | Yes | 4.1.0 |
| [Picture Fill](http://scottjehl.github.io/picturefill/) | /src/assets/js/vendor/picturefill.js | Yes | 3.0.2 |
| [jQuery Validate](https://jqueryvalidation.org/) | /src/assets/js/vendor/jquery.validate.min.js | No | 1.15.0 |
| [Slick](http://kenwheeler.github.io/slick/) | /src/assets/js/vendor/slick.min.js | Yes | 1.6.0 |
| [Object Visual Lock](https://github.com/trevorllarson/object-visual-lock) | /src/assets/js/vendor/object-visual-lock.js | No | 1.0.16 |
| [Youtube Iframe Assistant](https://github.com/trevorllarson/youtube-iframe-assistant) | /src/assets/js/vendor/youtube-iframe-assistant.js | Yes | 1.0.10 |
| [jQuery.actual](https://github.com/dreamerslab/jquery.actual) | /src/assets/js/vendor/jquery.actual.min.js | Yes | 1.0.19 |



## PHP Packages

| Package | Install Script | Active by Default |
| :------ | :--- | :---------------- |
| [MailChimp](https://github.com/drewm/mailchimp-api) | `composer require drewm/mailchimp-api` | No |
| [Carbon](https://carbon.nesbot.com/docs/) | `composer require nesbot/carbon` | No |

## Theme Files and Folders

`acf-json` - The folder that ACF uses to store Custom Field data for storing in the repository

`includes` - This is where the high level PHP functionality lives. This includes some core WordPress configurations, helper functions, and more

    `custom-post-types.php` - Register custom post types and associated custom taxonomies.
    `helpers.php` - Helper functions for use across the site.

`partials` - This is where partial elements will be stored for use in different template files.

`404.php` - Default WordPress page to handle 404s

`footer.php` - Default WordPress footer file

`functions.php` - Default WordPress functions file, used for integrating `includes` files

`header.php` - Default WordPress header file

`index.php` - Default WordPress index file, used for posts page out of the box

`page.php` - Default WordPress page file

`screenshot.png` - Theme's Cover Image for selection in WordPress

`search.php` - Default WordPress search results page

`single.php` - Default WordPress single for standard Posts

`style.css` - File to define the template's details

## Git Setup

Follow the WP Engine steps <a href="https://wpengine.com/support/git/#Option_B_Keep_WordPress_core_files_versioned">here</a> for proper Git setup on your project and pushing to the correct environments.

For all WPE linked repositories, we push to 'origin' (repo) and 'production'(production site). 

If this is a new project or you're adding a site to Git for the first time, make sure you have a WP Engine enviroment with the appropriate access. Then complete the following steps (details <a href="https://wpengine.com/support/git/">here</a>):

1. Add your SSH public key and Developer name to the 'Git Push' section inside of each WP Engine environment you wish to push to. This has to be done manually for every production, staging and dev environment.
2. Copy content locally. Setup your local enviroment with the most recent copy of the production environment. 
3. Create a new repo in the C1 Github account. Name should be in this format: SITENAME-YEAR, ex. subiesmith-2021.

## Fallback Images

### Usage
`crimson_generate_fallback_image($size, $color)`

Size: the given "slug" of the image size needed
Color: colors to choose from based on theme, defaults to random

> All images will need to be created using the design file, following the template of `size-here-color-here.jpg` e.g. `hero-green.jpg` or `blog-thumbnail-yellow.jpg`

```php
<?php if($heroImage = get_field('hero_image')): ?>
    
    <picture class="main-hero-image">
        <source srcset="<?= $heroImage['sizes']['hero']; ?>" media="(min-width: 768px)">
        <img srcset="<?= $heroImage['sizes']['hero-mobile']; ?>" alt="<?php the_title(); ?>">
    </picture>

<?php else: ?>

    <picture class="main-hero-image">
        <source srcset="<?= crimson_generate_fallback_image('hero'); ?>" media="(min-width: 768px)">
        <img srcset="<?= crimson_generate_fallback_image('hero-mobile', 'blue'); ?>" alt="<?php the_title(); ?>">
    </picture>

<?php endif; ?>
```


