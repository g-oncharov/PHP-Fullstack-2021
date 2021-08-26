let id = parseInt(getLastPartUrl());
let category = getFirstPartUrl();
if (isNaN(id)) {
    id = 1;
}
getData(`/api/${category}/${id}`)
    .then((data) => {
        outputCategoryTitle(category);
        outputProductsList(data.products, '.products-list');
        if (data.pagesCount > 1) {
            outputPagination(data.pagesCount, '.pagination');
        }
    })
    .catch(err => console.log(`Error: ${err}`))
