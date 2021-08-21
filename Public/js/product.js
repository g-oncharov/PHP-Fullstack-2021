let id = getLastPartUrl();
getData(`api/product/${id}`)
    .then((data) => {
        outputProductTitle(data.category, data.title);
        outputProduct(data)
    })
    .catch(err => console.log(`Error: ${err}`))
