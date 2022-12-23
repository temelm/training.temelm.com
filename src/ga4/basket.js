window.basket = {}

window.basket.init = () => {
  const bskt = localStorage.getItem('basket')
  window.basket.itemList = (!bskt) ? [] : JSON.parse(bskt)
}

window.basket.init()

window.basket.add = item => {
  const index = window.basket.itemList.findIndex(i => i.id === item.id)
  if (index === -1) {
    window.basket.itemList.push(item)
  } else {
    window.basket.itemList[index].quantity += item.quantity
  }
  localStorage.setItem('basket', JSON.stringify(window.basket.itemList))
}

window.basket.remove = itemId => {
  const index = window.basket.itemList.findIndex(i => i.id === itemId)
  if (index >= 0) {
    window.basket.itemList.splice(index, 1)
    localStorage.setItem('basket', JSON.stringify(window.basket.itemList))
  }
}

window.basket.clear = () => {
  window.basket.itemList = []
  localStorage.setItem('basket', JSON.stringify(window.basket.itemList))
}