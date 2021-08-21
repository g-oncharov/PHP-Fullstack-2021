getData('api/phones')
    .then((data) => outputProductsList(data, '.products-list--phones'))
    .catch(err => console.log(`Error: ${err}`))

getData('api/tablets')
    .then((data) => outputProductsList(data, '.products-list--tablets'))
    .catch(err => console.log(`Error: ${err}`))