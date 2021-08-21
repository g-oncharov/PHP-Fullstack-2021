let category = getLastPartUrl();
getData(`api/${category}`)
    .then((data) => {
        outputCategoryTitle(category);
        outputProductsList(data, '.products-list');
    })
    .catch(err => console.log(`Error: ${err}`))
