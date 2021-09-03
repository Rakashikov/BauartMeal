const cheerio = require("cheerio")
const axius = require("./axius")


module.exports.test = async () => { console.log('HELLO TEST FUNC'); }

exports.parse = async (URL, flag) => {
    let data = await axius.getHtml(URL);
    const $ = cheerio.load(data);
    if (URL.includes('delivery')) {
        return await parseDelivary(data, flag, $);
    }
    else if (URL.includes('yandex')) {
        return await parseYandex(data, flag, $)
    }
}

async function parseDelivary(data, flag, $) {
    if (flag == 1) {
        return {
            name: $('.vendor-headline__title').text(),
            logo: $('.vendor-headline__logo').attr('src'),
        }
    } else {
        var products = [];
        var rest = {
            name: $('.vendor-headline__title').text(),
            logo: $('.vendor-headline__logo').attr('src'),
            menu: products
        };
        $('.menu-product').each((i, elem) => {
            products.push({
                product_id: i,
                product_name: $(elem).find('.menu-product__info-block.menu-product__info-block--hover > .menu-product__title').text() == '' ?
                    $(elem).find('.menu-product__title').text() :
                    $(elem).find('.menu-product__info-block.menu-product__info-block--hover > .menu-product__title').text(),
                product_disc: $(elem).find('.menu-product__info-block.menu-product__info-block--hover').find('.menu-product__description').text(),
                product_price: $(elem).find('.menu-product__price').text().substring(13).slice(0, -13),
                product_image: $(elem).find('.menu-product__img').attr('data-src'),
                product_count: 1
            });
        });
        return rest;
    }
}

async function parseYandex(data, $) {
    var products = [];
    var rest = {
        name: $('.RestaurantPageHeader_name').text(),
        logo: $('.UIMagicalImage_image.RestaurantPageHeader_image').attr('style'),
        menu: products
    };
    $('.RestaurantPageMenuCategory_item').each((i, elem) => {
        products.push({
            product_name: $(elem).find('.RestaurantPageMenuItem_title').text(),
            product_disc: $(elem).find('RestaurantPageMenuItem_weight').text() + "\n" + $(elem).find('.HTMLDescription_root.RestaurantPageMenuItem_description').text(),
            product_price: $(elem).find('.Price_root').text(),
            product_image: $(elem).find('.UIMagicalImage_image.RestaurantPageMenuItem_pictureImage').attr('style')
        });
    });
    return rest;
}
