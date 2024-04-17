import countryTranslations from "./countries.mjs";
import interfaceTranslations from "./interface.mjs";
window.fr = countryTranslations.fr;
export default { ...countryTranslations, ...interfaceTranslations };
