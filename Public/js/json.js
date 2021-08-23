const getData = async url => {
    const response = await fetch(url);
    return await response.json();
}

const outputProductsList = (data, elem) => {
    let html = '';
    document.querySelector(elem).innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        html = `
                        <li class="product-item">
                                <a href="/product/${data[i].id}">
                                  <div class="product-item__image">
                                    <img src="/Public/products/${data[i].image}" alt="">
                                  </div>
                                  <div class="product-item__text">
                                    <p class="product-item__name">${data[i].title}</p>
                                    <p class="product-item__price">${data[i].price} $</p>
                                  </div>
                                </a>
                          </li>
                        `;
        document.querySelector(elem).innerHTML += html.trim();
    }
}


const outputCategoryTitle = title => {
    document.querySelector('.breadcrumb-item--category').innerText = title;
    document.querySelector('.products--all h2').innerText = title;
}

const outputProductTitle = (category, product) => {
    let link = `/${category.toLowerCase()}`;
    document.querySelector('.breadcrumb-item--category a').innerText = category;
    document.querySelector('.breadcrumb-item--category a').href = link;
    document.querySelector('.breadcrumb-item--product').innerText = product;
}

const getLastPartUrl = () => {
    let temp = window.location.href.split('/');
    return temp[temp.length - 1];
}
