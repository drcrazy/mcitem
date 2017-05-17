# mcitem plugin for DokuWiki
Adds Minecraft item link with icon

All documentation for this plugin can be found at
https://github.com/drcrazy/mcitem

If you install this plugin manually, make sure it is installed in
lib/plugins/mcitem/ - if the folder is called different it
will not work!

Please refer to http://www.dokuwiki.org/plugins for additional info
on how to install plugins in DokuWiki.

## Concept

Every mod (that is [Minecraft Forge](http://www.minecraftforge.net/)'s way of talking about extensions) has its own sub-space in the wiki.

Every mod's sub-space is located within the root space `:mods:`. 

Every image of a block or item is named exactly like its description page in the wiki. And is provided as PNG.

*Example: The vanilla block Smooth Stone would have its page on `:mods:minecraft:stone`.*

*Example: The vanilla block Smooth Stone would have an image under `:mods:minecraft:stone.png`.*

## Usage

Anywhere on a wiki page you can add the mcitem tag and specify item inside this tag in format 'modname':'itemname', for example, 'minecraft:redstone' which will result in a link to your wiki page about redstone with redstone icon prepended.

##Credits

Plugin inspiration and major part of readme is from mcrecipe Dokuwiki plugin made by [cryxli](https://github.com/cryxli)
