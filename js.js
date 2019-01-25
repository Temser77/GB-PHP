"use strict";

const allImages = document.querySelectorAll('.galleryPreviewsContainer img');

/**
 * @property {Object} settings Объект с настройками галереи.
 * @property {string} settings.previewSelector Селектор обертки для миниатюр галереи.
 * @property {string} settings.openedImageWrapperClass Класс для обертки открытой картинки.
 * @property {string} settings.openedImageClass Класс открытой картинки.
 * @property {string} settings.openedImageScreenClass Класс для ширмы открытой картинки.
 * @property {string} settings.openedImageCloseBtnClass Класс для картинки кнопки закрыть.
 * @property {string} settings.openedImageCloseBtnSrc Путь до картинки кнопки открыть.
 */
const gallery = {
  settings: {
    previewSelector: '.mySuperGallery',
    openedImageWrapperClass: 'galleryWrapper',
    openedImageClass: 'galleryWrapper__image',
    openedImageScreenClass: 'galleryWrapper__screen',
    openedImageCloseBtnClass: 'galleryWrapper__close',
    openedImageCloseBtnSrc: 'images/gallery/close.png',
    openedImageNotFoundPicSrc: 'images/notfound.jpg',
    switchImageLeftClass: 'galleryWrapper__switchPicLeft',
    switchImageRightClass: 'galleryWrapper__switchPicRight',
  },

  /**
   * Инициализирует галерею, ставит обработчик события.
   * @param {Object} userSettings Объект настроек для галереи.
   */
  init(userSettings = {}) {
    // Записываем настройки, которые передал пользователь в наши настройки.
    Object.assign(this.settings, userSettings);

    // Находим элемент, где будут превью картинок и ставим обработчик на этот элемент,
    // при клике на этот элемент вызовем функцию containerClickHandler в нашем объекте
    // gallery и передадим туда событие MouseEvent, которое случилось.
    document
      .querySelector(this.settings.previewSelector)
      .addEventListener('click', event => this.containerClickHandler(event));
  },

  /**
   * Обработчик события клика для открытия картинки.
   * @param {MouseEvent|Event} event Событие клики мышью.
   * @param {HTMLElement} event.target Целевой объект, куда был произведен клик.
   */
  containerClickHandler(event) {
    // Если целевой тег не был картинкой, то ничего не делаем, просто завершаем функцию.
    if (event.target.tagName !== 'IMG') {
      return;
    }
    // Открываем картинку с полученным из целевого тега (data-full_image_url аттрибут).
    this.openImage(event.target.dataset.full_image_url);
  },

  /**
   * Открывает картинку.
   * @param {string} src Ссылка на картинку, которую надо открыть.
   */
  openImage(src) {
    // Получаем контейнер для открытой картинки, в нем находим тег img и ставим ему нужный src.
    const imgBig = this.getScreenContainer().querySelector(`.${this.settings.openedImageClass}`);
    imgBig.src = src;
    imgBig.dataset.full_image_url = src;
    // Если картинка не найдена, то подставляем src от картинки-заглушки
    imgBig.addEventListener('error', () => {
      imgBig.src = this.settings.openedImageNotFoundPicSrc;
    })

  },

  /**
   * Возвращает контейнер для открытой картинки, либо создает такой контейнер, если его еще нет.
   * @returns {Element}
   */
  getScreenContainer() {
    // Получаем контейнер для открытой картинки.
    const galleryWrapperElement = document.querySelector(`.${this.settings.openedImageWrapperClass}`);
    // Если контейнер для открытой картинки существует - возвращаем его.
    if (galleryWrapperElement) {
      return galleryWrapperElement;
    }

    // Возвращаем полученный из метода createScreenContainer контейнер.
    return this.createScreenContainer();
  },

  /**
   * Создает контейнер для открытой картинки.
   * @returns {HTMLElement}
   */
  createScreenContainer() {
    // Создаем сам контейнер-обертку и ставим ему класс.
    const galleryWrapperElement = document.createElement('div');
    galleryWrapperElement.classList.add(this.settings.openedImageWrapperClass);

    // Создаем контейнер занавеса, ставим ему класс и добавляем в контейнер-обертку.
    const galleryScreenElement = document.createElement('div');
    galleryScreenElement.classList.add(this.settings.openedImageScreenClass);
    galleryWrapperElement.appendChild(galleryScreenElement);

    // Создаем картинку для кнопки закрыть, ставим класс, src и добавляем ее в контейнер-обертку.
    const closeImageElement = new Image();
    closeImageElement.classList.add(this.settings.openedImageCloseBtnClass);
    closeImageElement.src = this.settings.openedImageCloseBtnSrc;
    closeImageElement.addEventListener('click', () => this.close());
    galleryWrapperElement.appendChild(closeImageElement);

    // Создаем картинку, которую хотим открыть, ставим класс и добавляем ее в контейнер-обертку.
    const image = new Image();
    image.classList.add(this.settings.openedImageClass);
    galleryWrapperElement.appendChild(image);

    // Создаем кнопку влево. Я использовал тег <a>, добавляем в тег знак '<', добавляем класс и обработку клика
    // добавляем в контейнер-обертку
    const switchPicLeft = document.createElement('a');
    switchPicLeft.innerHTML = '&lt;';
    switchPicLeft.classList = this.settings.switchImageLeftClass;
    switchPicLeft.addEventListener('click', () => this.getLeftImg());
    galleryWrapperElement.appendChild(switchPicLeft);

    // Создаем кнопку вправо. Я использовал тег <a>, добавляем в тег знак '<', добавляем класс и обработку клика
    // добавляем в контейнер-обертку
    const switchPicRight = document.createElement('a');
    switchPicRight.innerHTML = '&gt;';
    switchPicRight.classList = this.settings.switchImageRightClass;
    switchPicRight.addEventListener('click', () => this.getRightImg());
    galleryWrapperElement.appendChild(switchPicRight);

    // Добавляем контейнер-обертку в тег body.
    document.body.appendChild(galleryWrapperElement);



    // Возвращаем добавленный в body элемент, наш контейнер-обертку.
    return galleryWrapperElement;
  },

  /**
   * Закрывает (удаляет) контейнер для открытой картинки.
   */
  close() {
    document.querySelector(`.${this.settings.openedImageWrapperClass}`).remove();
  },

  /**
   * Получает предыдущую картинку в галерее и открывает ее
   */
  getLeftImg () {
    const imgIndex = this.findBigImgIndex();
    imgIndex > 0 ? this.openImage(allImages[imgIndex - 1].dataset.full_image_url)
      : this.openImage(allImages[allImages.length - 1].dataset.full_image_url);
  },

  /**
   * Получает следующую картинку в галерее и котрывает ее
   */
  getRightImg () {
    const imgIndex = this.findBigImgIndex();
    imgIndex < (allImages.length - 1) ? this.openImage(allImages[imgIndex + 1].dataset.full_image_url)
      : this.openImage(allImages[0].dataset.full_image_url);
  },

  /**
   * Ищет индекс текущей картинке среди всех картинок в контейнере с классом galleryPreviewsContainer
   * @returns {number} - индекс картинки
   */
  findBigImgIndex () {
    for (let i = 0; i < allImages.length; i++) {
      if (allImages[i].dataset.full_image_url ===
        document.querySelector('.galleryWrapper__image').dataset.full_image_url) {
        return i;
      }
    }
  },

};


// Инициализируем нашу галерею при загрузке страницы.
window.onload = () => gallery.init({previewSelector: '.galleryPreviewsContainer'});