<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\BootstrapCMS\Http\Controllers;

use GrahamCampbell\BootstrapCMS\Http\Middleware\Auth\Blog;
use GrahamCampbell\BootstrapCMS\Http\Middleware\Auth\Edit;
use GrahamCampbell\Credentials\Http\Controllers\AbstractController as Controller;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * This is the abstract controller class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
abstract class AbstractController extends Controller
{
    use DispatchesCommands, ValidatesRequests;

    /**
     * A list of methods protected by edit permissions.
     *
     * @var string[]
     */
    protected $edits = [];

    /**
     * A list of methods protected by blog permissions.
     *
     * @var string[]
     */
    protected $blogs = [];

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        if ($this->edits) {
            $this->middleware(Edit::class, ['only' => $this->edits]);
        }

        if ($this->blogs) {
            $this->middleware(Blog::class, ['only' => $this->blogs]);
        }
    }
}
