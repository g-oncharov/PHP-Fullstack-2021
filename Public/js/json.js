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

const outputProduct = data => {
    let html = `          
                  <div class="product-about__item">
                    <div class="product-about__image">
                      <img src="/Public/products/${data.image}" alt="">
                    </div>
                    <div class="product-about__text">
                      <p class="product-about__name"><?= $item->${data.title}</p>
                      <p class="product-about__description"><?= $item->${data.description}</p>
                      <div class="product-about__price-wrapper">
                        <p class="product-about__price"><?= $item->${data.price} $</p>
                        <button class="product-about__btn btn-purple btn">Add to cart</button>
                      </div>
                    </div>
                  </div>
              `;
    html = html.trim();
    document.querySelector('.product-item__wrapper').innerHTML = html;
};

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
