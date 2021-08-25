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

const outputPagination = (length, elem) => {
    let category = getFirstPartUrl();
    let page = parseInt(getLastPartUrl());
    if (isNaN(page)) {
        page = 1;
    }
    let prevPage = page - 1;
    let nextPage = page + 1;

    if (prevPage < 1) {
        prevPage = 1;
    }
    if (nextPage >= length) {
        nextPage = length;
    }

    let html = `<li><a href="/${category}/${prevPage}" class="pagination__page-prev">< Prev</a></li>`;
    for (let i = 0; i < length; i++) {
        let page = i + 1;
        html += `<li class="pagination__page-number"><a href="/${category}/${page}">${page}</a></li>`
    }
    html += `<li><a href="/${category}/${nextPage}" class="pagination__page-next">Next ></a></li>`;

    document.querySelector(elem).innerHTML += html.trim();
    document.querySelectorAll(`${elem} > .pagination__page-number`)[page - 1].classList.add('active');
    document.querySelector(elem).classList.add('d-flex');
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

const getFirstPartUrl = () => {
    let temp = window.location.href.split('/');
    return temp[3];
}
