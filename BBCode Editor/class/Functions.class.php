<?php
class Functions {

	public static function BBCode($element, $type = '1'){
		?>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[b]" data-bbcode-after="[/b]" data-bbcode><i class="fa fa-bold tip" title="Negrito"></i></button>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[i]" data-bbcode-after="[/i]" data-bbcode><i class="fa fa-italic tip" title="Itálico"></i></button>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[u]" data-bbcode-after="[/u]" data-bbcode><i class="fa fa-underline tip" title="Underline"></i></button>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[s]" data-bbcode-after="[/s]" data-bbcode><i class="fa fa-strikethrough tip" title="Escrita Tachada"></i></button>
		<?php if($type == 2){ ?>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[img]" data-bbcode-after="[/img]" data-bbcode><i class="far fa-image tip" title="Inserir Imagem"></i></button>
		<?php } ?>
		<button type="button" data-bbcode-el="moreButtons" data-type="colors<?= explode('#', $element)[1] ?>" data-bbcode><i class="fa fa-tint tip" title="Cores"></i>&nbsp;&nbsp;<i class="fa fa-chevron-down" style="font-size: 9px; opacity: 0.7;"></i></button>
		<button type="button" data-bbcode-el="moreButtons" data-type="emoji<?= explode('#', $element)[1] ?>" data-bbcode><i class="fas fa-grin-alt"></i>&nbsp;&nbsp;<i class="fa fa-chevron-down" style="font-size: 9px; opacity: 0.7;"></i></button>
		<?php if($type == 2){ ?>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[center]" data-bbcode-after="[/center]" data-bbcode><i class="fa fa-align-center tip" title="Centralizar"></i></button>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[url=https://google.com.br/]" data-bbcode-after="[/url]" data-bbcode><i class="fa fa-link tip" title="Inserir URL"></i></button>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[youtube]" data-bbcode-after="[/youtube]" data-bbcode><i class="fab fa-youtube tip" title="Inserir Vídeo"></i></button>
		<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[quote]" data-bbcode-after="[/quote]" data-bbcode><i class="fa fa-quote-left tip" title="Citar"></i></button>
		<button type="button" data-bbcode-el="moreButtons" data-type="fontSize<?= explode('#', $element)[1] ?>" data-bbcode><i class="fa fa-font tip" title="Tamanho da Letra"></i>&nbsp;&nbsp;<i class="fa fa-chevron-down" style="font-size: 9px; opacity: 0.7;"></i></button>
		<div class="moreButtons" id="fontSize<?= explode('#', $element)[1] ?>">
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[size=1]" data-bbcode-after="[/size]" data-bbcode>Minúscula</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[size=2]" data-bbcode-after="[/size]" data-bbcode>Pequena</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[size=3]" data-bbcode-after="[/size]" data-bbcode>Normal</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[size=4]" data-bbcode-after="[/size]" data-bbcode>Grande</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[size=5]" data-bbcode-after="[/size]" data-bbcode>Enorme</button>
		</div>
		<?php } ?>
		<div class="moreButtons" id="colors<?= explode('#', $element)[1] ?>">
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=red]" data-bbcode-after="[/color]" data-bbcode>Vermelho</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=orange]" data-bbcode-after="[/color]" data-bbcode>Laranja</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=yellow]" data-bbcode-after="[/color]" data-bbcode>Amarelo</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=green]" data-bbcode-after="[/color]" data-bbcode>Verde</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=blue]" data-bbcode-after="[/color]" data-bbcode>Azul Claro</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=pink]" data-bbcode-after="[/color]" data-bbcode>Rosa</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=marine]" data-bbcode-after="[/color]" data-bbcode>Azul Marinho</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=gray]" data-bbcode-after="[/color]" data-bbcode>Cinza</button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[color=black]" data-bbcode-after="[/color]" data-bbcode>Preto</button>
		</div>
		<div class="moreButtons" id="emoji<?= explode('#', $element)[1] ?>">
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=laughing]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-laughing.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=cry]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-cry.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=wink]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-wink.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=embarassed]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-embarassed.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=cool]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-cool.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=kiss]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-kiss.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=foot-in-mouth]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-foot-in-mouth.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=frown]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-frown.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=innocent]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-innocent.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=tongue-out]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-tongue-out.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=money-mouth]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-money-mouth.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=surprised]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-surprised.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=yell]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-yell.gif"/></button>
			<button type="button" data-bbcode-el="<?= $element; ?>" data-bbcode-before="[emoji=undecided]" data-bbcode-after="" data-bbcode><img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-undecided.gif"/></button>
		</div>
		<?php
		}

	public static function ViewBB($text, $type = 1){
		if($type == 2){

			$array = array(
				'/\[b\](.*?)\[\/b\]/' => '<b>$1</b>',
				'/\[u\](.*?)\[\/u\]/' => '<u>$1</u>',
				'/\[i\](.*?)\[\/i\]/' => '<i>$1</i>',
				'/\[s\](.*?)\[\/s\]/' => '<s>$1</s>',
				'/\[url=(.*?)\](.*?)\[\/url\]/' => '<a href="$1" target="_blank">$2</a>',
				'/\[img\](.*?)\[\/img\]/' => '<img src="$1">',
				'/\[youtube\]https:\/\/www.youtube.com\/watch\?v=(.*?)\[\/youtube\]/' => '<iframe width="500" height="350" frameBorder="no" scrolling="no" src="https://www.youtube.com/embed/$1"></iframe>',
				'/\[center\](.*?)\[\/center\]/is' => '<center>$1</center>',
				'/\[color=gray\](.*?)\[\/color\]/is' => '<span style="color: #607d8b;">$1</span>',
				'/\[color=blue\](.*?)\[\/color\]/is' => '<span style="color: #3aa8ce;">$1</span>',
				'/\[color=green\](.*?)\[\/color\]/is' => '<span style="color: #80d500;">$1</span>',
				'/\[color=yellow\](.*?)\[\/color\]/is' => '<span style="color: #ffbc00;">$1</span>',
				'/\[color=orange\](.*?)\[\/color\]/is' => '<span style="color: #D96D00;">$1</span>',
				'/\[color=red\](.*?)\[\/color\]/is' => '<span style="color: #f82a2a;">$1</span>',
				'/\[color=darkblue\](.*?)\[\/color\]/is' => '<span style="color: #145b73;">$1</span>',
				'/\[color=pink\](.*?)\[\/color\]/is' => '<span style="color: #ff008d;">$1</span>',
				'/\[color=marine\](.*?)\[\/color\]/is' => '<span style="color: #00aeae;">$1</span>',
				'/\[color=black\](.*?)\[\/color\]/is' => '<span style="color: #A300D9;">$1</span>',
				'/\[size=1\](.*?)\[\/size\]/is' => '<span style="font-size: 0.675rem;">$1</span>',
				'/\[size=2\](.*?)\[\/size\]/is' => '<span style="font-size: 0.775rem;">$1</span>',
				'/\[size=3\](.*?)\[\/size\]/is' => '<span style="font-size: 0.875rem;">$1</span>',
				'/\[size=4\](.*?)\[\/size\]/is' => '<span style="font-size: 0.975rem;">$1</span>',
				'/\[size=5\](.*?)\[\/size\]/is' => '<span style="font-size: 1.075rem;">$1</span>',
				'/\[quote\](.*?)\[\/quote\]/is' => '<blockquote>$1</blockquote>',
				'/\[emoji=laughing\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-laughing.gif" >',
				'/\[emoji=cry\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-cry.gif" >',
				'/\[emoji=wink\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-wink.gif" >',
				'/\[emoji=embarassed\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-embarassed.gif" >',
				'/\[emoji=cool\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-cool.gif" >',
				'/\[emoji=laughing\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-laughing.gif" >',
				'/\[emoji=kiss\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-kiss.gif" >',
				'/\[emoji=foot-in-mouth\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-foot-in-mouth.gif" >',
				'/\[emoji=frown\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-frown.gif" >',
				'/\[emoji=innocent\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-innocent.gif" >',
				'/\[emoji=tongue-out\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-tongue-out.gif" >',
				'/\[emoji=money-mouth\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-money-mouth.gif" >',
				'/\[emoji=surprised\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-surprised.gif" >',
				'/\[emoji=yell\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-yell.gif" >',
				'/\[emoji=undecided\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-undecided.gif" >'
			);

			if(strpos($text, '[quote]') !== false):

				$count = substr_count($text, '[quote]');

				for($i = 0; $i <= $count; $i++):

					$text = preg_replace(array_keys($array), array_values($array), $text);

				endfor;

			endif;

			$text = preg_replace(array_keys($array), array_values($array), $text);

			return $text;

		}else{

			$array = array(
				'/\[b\](.*?)\[\/b\]/' => '<b>$1</b>',
				'/\[u\](.*?)\[\/u\]/' => '<u>$1</u>',
				'/\[i\](.*?)\[\/i\]/' => '<i>$1</i>',
				'/\[s\](.*?)\[\/s\]/' => '<s>$1</s>',
				'/\[url=(.*?)\](.*?)\[\/url\]/' => '<a href="$1" target="_blank">$2</a>',
				'/\[center\](.*?)\[\/center\]/is' => '<center>$1</center>',
				'/\[color=gray\](.*?)\[\/color\]/is' => '<span style="color: #607d8b;">$1</span>',
				'/\[color=blue\](.*?)\[\/color\]/is' => '<span style="color: #3aa8ce;">$1</span>',
				'/\[color=green\](.*?)\[\/color\]/is' => '<span style="color: #80d500;">$1</span>',
				'/\[color=yellow\](.*?)\[\/color\]/is' => '<span style="color: #ffbc00;">$1</span>',
				'/\[color=orange\](.*?)\[\/color\]/is' => '<span style="color: #D96D00;">$1</span>',
				'/\[color=red\](.*?)\[\/color\]/is' => '<span style="color: #f82a2a;">$1</span>',
				'/\[color=darkblue\](.*?)\[\/color\]/is' => '<span style="color: #145b73;">$1</span>',
				'/\[color=pink\](.*?)\[\/color\]/is' => '<span style="color: #ff008d;">$1</span>',
				'/\[color=marine\](.*?)\[\/color\]/is' => '<span style="color: #00aeae;">$1</span>',
				'/\[color=black\](.*?)\[\/color\]/is' => '<span style="color: #A300D9;">$1</span>',
				'/\[emoji=laughing\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-laughing.gif" >',
				'/\[emoji=cry\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-cry.gif" >',
				'/\[emoji=wink\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-wink.gif" >',
				'/\[emoji=embarassed\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-embarassed.gif" >',
				'/\[emoji=cool\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-cool.gif" >',
				'/\[emoji=laughing\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-laughing.gif" >',
				'/\[emoji=kiss\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-kiss.gif" >',
				'/\[emoji=foot-in-mouth\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-foot-in-mouth.gif" >',
				'/\[emoji=frown\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-frown.gif" >',
				'/\[emoji=innocent\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-innocent.gif" >',
				'/\[emoji=tongue-out\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-tongue-out.gif" >',
				'/\[emoji=money-mouth\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-money-mouth.gif" >',
				'/\[emoji=surprised\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-surprised.gif" >',
				'/\[emoji=yell\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-yell.gif" >',
				'/\[emoji=undecided\]/' => '<img src="http://cdn.tinymce.com/4/plugins/emoticons/img/smiley-undecided.gif" >'
			);

			$text = preg_replace(array_keys($array), array_values($array), $text);

			return $text;
		}
	}
}

$Functions = new Functions();