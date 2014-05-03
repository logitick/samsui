<?php namespace Samsui\Generator\Provider;

class Lipsum extends BaseProvider
{
    protected static $words = array(
        'alias', 'consequatur', 'aut', 'perferendis', 'sit', 'voluptatem',
        'accusantium', 'doloremque', 'aperiam', 'eaque', 'ipsa', 'quae', 'ab',
        'illo', 'inventore', 'veritatis', 'et', 'quasi', 'architecto',
        'beatae', 'vitae', 'dicta', 'sunt', 'explicabo', 'aspernatur', 'aut',
        'odit', 'aut', 'fugit', 'sed', 'quia', 'consequuntur', 'magni',
        'dolores', 'eos', 'qui', 'ratione', 'voluptatem', 'sequi', 'nesciunt',
        'neque', 'dolorem', 'ipsum', 'quia', 'dolor', 'sit', 'amet',
        'consectetur', 'adipisci', 'velit', 'sed', 'quia', 'non', 'numquam',
        'eius', 'modi', 'tempora', 'incidunt', 'ut', 'labore', 'et', 'dolore',
        'magnam', 'aliquam', 'quaerat', 'voluptatem', 'ut', 'enim', 'ad',
        'minima', 'veniam', 'quis', 'nostrum', 'exercitationem', 'ullam',
        'corporis', 'nemo', 'enim', 'ipsam', 'voluptatem', 'quia', 'voluptas',
        'sit', 'suscipit', 'laboriosam', 'nisi', 'ut', 'aliquid', 'ex', 'ea',
        'commodi', 'consequatur', 'reet', 'autem', 'vel', 'eum', 'iure',
        'reprehenderit', 'qui', 'in', 'ea', 'voluptate', 'velit', 'esse',
        'quam', 'nihil', 'molestiae', 'et', 'iusto', 'odio', 'dignissimos',
        'ducimus', 'qui', 'blanditiis', 'praesentium', 'laudantium', 'totam',
        'rem', 'voluptatum', 'deleniti', 'atque', 'corrupti', 'quos',
        'dolores', 'et', 'quas', 'molestias', 'excepturi', 'sint',
        'occaecati', 'cupiditate', 'non', 'provident', 'sed', 'ut',
        'perspiciatis', 'unde', 'omnis', 'iste', 'natus', 'error',
        'similique', 'sunt', 'in', 'culpa', 'qui', 'officia', 'deserunt',
        'mollitia', 'animi', 'id', 'est', 'laborum', 'et', 'dolorum', 'fuga',
        'et', 'harum', 'quidem', 'rerum', 'facilis', 'est', 'et', 'expedita',
        'distinctio', 'nam', 'libero', 'tempore', 'cum', 'soluta', 'nobis',
        'est', 'eligendi', 'optio', 'cumque', 'nihil', 'impedit', 'quo',
        'porro', 'quisquam', 'est', 'qui', 'minus', 'id', 'quod', 'maxime',
        'placeat', 'facere', 'possimus', 'omnis', 'voluptas', 'assumenda',
        'est', 'omnis', 'purus', 'repellendus', 'temporibus', 'autem',
        'quibusdam', 'et', 'aut', 'consequatur', 'vel', 'illum', 'qui',
        'dolorem', 'eum', 'fugiat', 'quo', 'mauris', 'voluptas', 'nulla', 'pariatur',
        'at', 'vero', 'eos', 'et', 'accusamus', 'officiis', 'debitis', 'aut',
        'rerum', 'necessitatibus', 'saepe', 'eveniet', 'ut', 'et',
        'voluptates', 'repudiandae', 'sint', 'et', 'molestiae', 'non',
        'recusandae', 'itaque', 'earum', 'beet', 'hic', 'tenetur', 'a',
        'sapiente', 'delectus', 'ut', 'aut', 'reiciendis', 'voluptatibus',
        'maiores', 'doloribus', 'asperiores', 'repellat', 'sollicitudin', 'tempus',
        'proin', 'lacinia', 'lacus', 'gravida', 'donec', 'felis', 'viverra',
        'orci', 'morbi', 'vivamus', 'arcu', 'mollis', 'libero', 'liberatus',
        'rutrum', 'tortor', 'semper', 'pharetra', 'eros', 'cura', 'faucibus', 'is', 'fi', 'le',
        'lecidus', 'rum', 'de', 'desil', 'erus'
    );

    public function word()
    {
        return $this->generator->math->randomArrayValue(self::$words);
    }

    public function words($number)
    {
        $result = array();
        while ($number-- > 0) {
            $result[] = $this->word();
        }
        return implode(' ', $result);
    }

    /**
     * @param integer $numberOfWords
     */
    public function sentence($numberOfWords = null)
    {
        if (!$numberOfWords) {
            $numberOfWords = $this->generator->math->between(3, 12);
        }
        $words = $this->words($numberOfWords);
        return ucfirst($words) . '.';
    }

    /**
     * @param integer $numberOfSentence
     */
    public function paragraph($numberOfSentence = null)
    {
        if (!$numberOfSentence) {
            $numberOfSentence = $this->generator->math->between(1, 9);
        }
        $result = array();
        while ($numberOfSentence-- > 0) {
            $result[] = $this->sentence();
        }
        return implode(' ', $result);
    }

    /**
     * @param integer $numberOfParagraphs
     */
    public function paragraphs($numberOfParagraphs = null, $breakline = "\n\n")
    {
        if (!$numberOfParagraphs) {
            $numberOfParagraphs = $this->generator->math->between(2, 6);
        }
        $result = array();
        while ($numberOfParagraphs-- > 0) {
            $result[] = $this->paragraph();
        }
        return implode($breakline, $result);
    }
}
