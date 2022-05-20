<?php

class Post extends DatabaseObject
{

    protected static $table_name = 'posts';
    protected static $db_columns = [
        'post_id',
        'author_id',
        'image_id',
        'headline',
        'content',
        'created',
        'updated',
        'is_published',
    ];

    public $allowed_tags = [
        '<br>',
        '<a>',
        '<p>',
        '<h3>',
        '<h4>',
        '<span>',
    ];

    public $post_id;
    public $author_id;
    public $image_id;
    public $headline;
    public $content;
    public $is_published;
    public $need_change;
    public $suggestions;
    protected $created;
    protected $published;

    public function __construct($args = [])
    {
        $this->author_id = $args['author_id'] ?? '';
        $this->image_id = $args['image_id'] ?? '';
        $this->headline = $args['headline'] ?? '';
        $this->content = $args['content'] ?? '';
        $this->suggestions = args['suggestions'] ?? '';
        $this->need_change = $args['need_change'] ?? 0;
        $this->is_published = $args['is_published'] ?? 0;
    }

    public function set_created()
    {
        $this->created = time();
    }

    public function set_updated()
    {
        $this->updated = time();
    }

} // end Post
