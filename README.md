# Contao 4 Add Browser Language As Body Class Bundle

Adds a class depending on the browser's accepted language to the body element.
You can define the used languages and the fallback language on every root page.

## Insert tags

You can use the following insert tags:

 * {{ifblng::<language>}} ... {{ifblng::<secondlanguage>}} .. {{ifblng}}
   If browser language ...
 * {{ifnblng::<language>}} ... {{ifnblng}}
   If not browser language
