<?php
/**
 * HTTP Client Methods - Assesment Core DNA
 *
 * PHP version 7
 *
 * @category Client
 * @package  Client
 * @author   Author <tanguybelin@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
namespace Client;

/**
 * Method Interface - Assesment Core DNA
 *
 * PHP version 7
 *
 * @category Client
 * @package  Client
 * @author   Author <tanguybelin@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
interface Method
{
    const GET = 'GET';
    const HEAD = 'HEAD';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
    const CONNECT = 'CONNECT';
    const OPTIONS = 'OPTIONS';
    const TRACE = 'TRACE';
    const BASELINE = 'BASELINE';
    const LINK = 'LINK';
    const UNLINK = 'UNLINK';
    const MERGE = 'MERGE';
    const BASELINECONTROL = 'BASELINE-CONTROL';
    const MKACTIVITY = 'MKACTIVITY';
    const VERSIONCONTROL = 'VERSION-CONTROL';
    const REPORT = 'REPORT';
    const CHECKOUT = 'CHECKOUT';
    const CHECKIN = 'CHECKIN';
    const UNCHECKOUT = 'UNCHECKOUT';
    const MKWORKSPACE = 'MKWORKSPACE';
    const UPDATE = 'UPDATE';
    const LABEL = 'LABEL';
    const ORDERPATCH = 'ORDERPATCH';
    const ACL = 'ACL';
    const MKREDIRECTREF = 'MKREDIRECTREF';
    const UPDATEREDIRECTREF = 'UPDATEREDIRECTREF';
    const MKCALENDAR = 'MKCALENDAR';
    const PROPFIND = 'PROPFIND';
    const LOCK = 'LOCK';
    const UNLOCK = 'UNLOCK';
    const PROPPATCH = 'PROPPATCH';
    const MKCOL = 'MKCOL';
    const COPY = 'COPY';
    const MOVE = 'MOVE';
    const SEARCH = 'SEARCH';
    const PATCH = 'PATCH';
    const BIND = 'BIND';
    const UNBIND = 'UNBIND';
    const REBIND = 'REBIND';
}
