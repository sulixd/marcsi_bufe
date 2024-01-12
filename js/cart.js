const addToCart = async (prod_id, base_url) => {
    await axios.get(base_url + 'cart_add.php?id=' + prod_id)
    alert('Sikeresen a kosárhoz adva')
}