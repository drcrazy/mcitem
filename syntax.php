<?php
/**
 * DokuWiki Plugin mcitem (Syntax Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  drcrazy <hcb@wowhcb.ru>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

class syntax_plugin_mcitem extends DokuWiki_Syntax_Plugin {
	
	/**
	 * @return array Plugin info
	 */
	public function getInfo() {
		return array(
				'author' => 'drcrazy',
				'email'  => 'hcb@wowhcb.ru',
				'date'   => '2017-05-17',
				'name'   => 'Minecraft Item Plugin',
				'desc'   => 'Adds Minecraft item link with icon to Dokuwiki.',
				'url'    => 'https://github.com/drcrazy/mcitem'
		);
	}
	
    /**
     * @return string Syntax mode type
     */
    public function getType() {
        return 'substition';
    }
    /**
     * @return string Paragraph type
     */
    public function getPType() {
        return 'normal';
    }
    /**
     * @return int Sort order - Low numbers go before high numbers
     */
    public function getSort() {
        return 55;
    }

    /**
     * Connect lookup pattern to lexer.
     *
     * @param string $mode Parser mode
     */
    public function connectTo($mode) {
        $this->Lexer->addEntryPattern('<mcitem>',$mode,'plugin_mcitem');
    }

   public function postConnect() {
       $this->Lexer->addExitPattern('<\/mcitem>','plugin_mcitem');
   }

    /**
     * Handle matches of the mcitem syntax
     *
     * @param string          $match   The match of the syntax
     * @param int             $state   The state of the handler
     * @param int             $pos     The position in the document
     * @param Doku_Handler    $handler The handler
     * @return array Data for the renderer
     */
    public function handle($match, $state, $pos, Doku_Handler $handler){
        $data = array();
        switch ($state) {
        	case DOKU_LEXER_ENTER :
        		break;
        	case DOKU_LEXER_MATCHED :
        		break;
        	case DOKU_LEXER_UNMATCHED :
        		$match = htmlspecialchars($match);
        		$rawName = 'mods:' . $match;
        		$match = explode(':', $match);
        		$prettyName = str_replace('_', ' ', $match[1]);
        		$prettyName = ucwords($prettyName, ' ');
        		$data = array($state, $rawName, $prettyName);
        		break;
        	case DOKU_LEXER_EXIT :
        		break;
        	case DOKU_LEXER_SPECIAL :
        		break;
        }

        return $data;
    }

    /**
     * Render xhtml output or metadata
     *
     * @param string         $mode      Renderer mode (supported modes: xhtml)
     * @param Doku_Renderer  $renderer  The renderer
     * @param array          $data      The data from the handler() function
     * @return bool If rendering was successful.
     */
    public function render($mode, Doku_Renderer $renderer, $data) {
        if($mode != 'xhtml') return false;
        $state = $data[0];
        switch ($state) {
        	case DOKU_LEXER_ENTER :
        		break;
        	case DOKU_LEXER_MATCHED :
        		break;
        	case DOKU_LEXER_UNMATCHED :
        		$imageName = $data[1] . '.png';
        		$renderer->internalmedia($imageName, $data[2], null, 24, null, 'cache', 'nolink', false);
        		$renderer->strong_open();
        		$renderer->internallink($data[1], $data[2]);
        		$renderer->strong_close();
        		break;
        	case DOKU_LEXER_EXIT :
        		break;
        	case DOKU_LEXER_SPECIAL :
        		break;
        }
        

        return true;
    }
}

// vim:ts=4:sw=4:et:
