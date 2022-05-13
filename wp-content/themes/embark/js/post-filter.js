
document.addEventListener("DOMContentLoaded", function() { 

    const postFilter = document.getElementById('postFilters');
    const categoryButtons = document.querySelectorAll('button[name="post-filter"]');
    let selectedCategories = [];
    let postsToFilter = window.filteredPosts;

    if (!postFilter) {
        return;
    }

    const gatherSelections = categoryButtons.forEach((button) => {
        
        button.addEventListener('click', function() {
            let value = this.value;
        
            if (!button.classList.contains('selected')) {
                button.classList.add('selected');
                if(!selectedCategories.includes(this.value)) {
                    selectedCategories.push(this.value);   
                    filterPosts();
                }
                
            } else {
                button.classList.remove('selected');
                //remove lingering focus
                this.blur();
                selectedCategories = selectedCategories.filter(item => item !== value);
                filterPosts();
            }
        })
    });

    /*
     * Update the "Latest" article element, residing at the first grid column position with the
     * excerpt and post link of the first visible (not a post with .d-none) post.
     */
    const updateLatest = () => {
        const   latestCallout = document.getElementById('latestCallout'),
                latestCalloutLink = document.querySelector('.js-latest-link'),
                latestCalloutExcerpt = latestCallout.querySelector('.js-latest-excerpt'),
                latestPostLink = document.querySelector('.posts-js .post-js:not(.d-none) a'),
                latestCalloutRead = document.getElementById('latestCalloutRead'),
                latestContent = document.getElementById('latestContent'),
                latestPostExcerpt = document.querySelector('.posts-js .post-js:not(.d-none) .js-excerpt').innerHTML,
                newPTag = document.createElement('p'),
                newExcrpt = document.createTextNode(latestPostExcerpt + '...');

        //Set callout "Latest", with the latest post link
        latestCalloutExcerpt.remove();
        latestCalloutLink.href = latestPostLink.href;
        //Upatate the "Latest" excerpt
        newPTag.classList.add('js-latest-excerpt');
        newPTag.appendChild(newExcrpt);
        latestContent.insertBefore(newPTag, latestCalloutRead);
    }
    /*
     * Update latest post one time on page load
     */
    updateLatest();

    /*
     * Checks a post's assigned categories against what categories are selected, 
     * and returns true if there is a match.
     */
    const findCommonElements = (arr1, arr2) => {
        return arr1.some(item => arr2.includes(item))
    }
    
     /*
     * The filtering function based on category selections
     */
    function filterPosts() {
        
        postsToFilter.forEach(function(post, index) {
            // match object. By default all posts are set to false
            let matches = {
                category: false,
            }
      
            const selectPost = document.getElementById('post-' + post.id);
            // if no categories are selected, show all posts
            if (!selectedCategories.length) {
                matches.category = true;
            // a post matches a selected category
            } else {
                if (findCommonElements(selectedCategories, post.cats)) matches.category = true;
            }

            if(matches.category) {
                selectPost.classList.remove('d-none');
            } else {
                selectPost.classList.add('d-none');
            }
        });

        updateLatest();
        limitPostCount();
    }

    /*
     * Limits visible posts in the grid to 11
     * 
     */
    const limitPostCount = () => {
        const activePosts = document.querySelectorAll('.posts-js .post-js:not(.d-none)');

        activePosts.forEach((post, index) => {
            if (index > 10) {
                post.classList.add('d-none');
            }
        })
    }

    limitPostCount();

});











