/*!
 * FilePondPluginImageExifOrientation 1.0.11
 * Licensed under MIT, https://opensource.org/licenses/MIT/
 * Please visit https://pqina.nl/filepond/ for details.
 */
const isJPEG = (file) => /^image\/jpeg/.test(file.type);
const Marker = {
  JPEG: 65496,
  APP1: 65505,
  EXIF: 1165519206,
  TIFF: 18761,
  Orientation: 274,
  Unknown: 65280
};
const getUint16 = (view, offset, little = false) => view.getUint16(offset, little);
const getUint32 = (view, offset, little = false) => view.getUint32(offset, little);
const getImageOrientation = (file) => new Promise((resolve, reject) => {
  const reader = new FileReader();
  reader.onload = function(e) {
    const view = new DataView(e.target.result);
    if (getUint16(view, 0) !== Marker.JPEG) {
      resolve(-1);
      return;
    }
    const length = view.byteLength;
    let offset = 2;
    while (offset < length) {
      const marker = getUint16(view, offset);
      offset += 2;
      if (marker === Marker.APP1) {
        if (getUint32(view, offset += 2) !== Marker.EXIF) {
          break;
        }
        const little = getUint16(view, offset += 6) === Marker.TIFF;
        offset += getUint32(view, offset + 4, little);
        const tags = getUint16(view, offset, little);
        offset += 2;
        for (let i = 0; i < tags; i++) {
          if (getUint16(view, offset + i * 12, little) === Marker.Orientation) {
            resolve(getUint16(view, offset + i * 12 + 8, little));
            return;
          }
        }
      } else if ((marker & Marker.Unknown) !== Marker.Unknown) {
        break;
      } else {
        offset += getUint16(view, offset);
      }
    }
    resolve(-1);
  };
  reader.readAsArrayBuffer(file.slice(0, 64 * 1024));
});
const IS_BROWSER = (() => typeof window !== "undefined" && typeof window.document !== "undefined")();
const isBrowser = () => IS_BROWSER;
const testSrc = "data:image/jpg;base64,/9j/4AAQSkZJRgABAQEASABIAAD/4QA6RXhpZgAATU0AKgAAAAgAAwESAAMAAAABAAYAAAEoAAMAAAABAAIAAAITAAMAAAABAAEAAAAAAAD/2wBDAP//////////////////////////////////////////////////////////////////////////////////////wAALCAABAAIBASIA/8QAJgABAAAAAAAAAAAAAAAAAAAAAxABAAAAAAAAAAAAAAAAAAAAAP/aAAgBAQAAPwBH/9k=";
let shouldCorrect = void 0;
const testImage = isBrowser() ? new Image() : {};
testImage.onload = () => shouldCorrect = testImage.naturalWidth > testImage.naturalHeight;
testImage.src = testSrc;
const shouldCorrectImageExifOrientation = () => shouldCorrect;
const plugin = ({ addFilter, utils }) => {
  const { Type, isFile } = utils;
  addFilter(
    "DID_LOAD_ITEM",
    (item, { query }) => new Promise((resolve, reject) => {
      const file = item.file;
      if (!isFile(file) || !isJPEG(file) || !query("GET_ALLOW_IMAGE_EXIF_ORIENTATION") || !shouldCorrectImageExifOrientation()) {
        return resolve(item);
      }
      getImageOrientation(file).then((orientation) => {
        item.setMetadata("exif", { orientation });
        resolve(item);
      });
    })
  );
  return {
    options: {
      // Enable or disable image orientation reading
      allowImageExifOrientation: [true, Type.BOOLEAN]
    }
  };
};
const isBrowser$1 = typeof window !== "undefined" && typeof window.document !== "undefined";
if (isBrowser$1) {
  document.dispatchEvent(
    new CustomEvent("FilePond:pluginloaded", { detail: plugin })
  );
}
export {
  plugin as default
};
