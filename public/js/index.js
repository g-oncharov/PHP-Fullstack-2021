getData('/api/phones/1')
    .then((data) => outputProductsList(data.products, '.products-list--phones'))
    .catch(err => console.log(`Error: ${err}`))

getData('/api/tablets/1')
    .then((data) => outputProductsList(data.products, '.products-list--tablets'))
    .catch(err => console.log(`Error: ${err}`))