<?php

namespace Base;

use \Bbcode as ChildBbcode;
use \BbcodeQuery as ChildBbcodeQuery;
use \Exception;
use Map\BbcodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bbcode' table.
 *
 *
 *
 * @method     ChildBbcodeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildBbcodeQuery orderByBbcodeExpr($order = Criteria::ASC) Order by the bbcode_expr column
 * @method     ChildBbcodeQuery orderByHtmlRep($order = Criteria::ASC) Order by the html_rep column
 * @method     ChildBbcodeQuery orderByHtmlExpr($order = Criteria::ASC) Order by the html_expr column
 * @method     ChildBbcodeQuery orderByBbcodeRep($order = Criteria::ASC) Order by the bbcode_rep column
 *
 * @method     ChildBbcodeQuery groupByName() Group by the name column
 * @method     ChildBbcodeQuery groupByBbcodeExpr() Group by the bbcode_expr column
 * @method     ChildBbcodeQuery groupByHtmlRep() Group by the html_rep column
 * @method     ChildBbcodeQuery groupByHtmlExpr() Group by the html_expr column
 * @method     ChildBbcodeQuery groupByBbcodeRep() Group by the bbcode_rep column
 *
 * @method     ChildBbcodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBbcodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBbcodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBbcode findOne(ConnectionInterface $con = null) Return the first ChildBbcode matching the query
 * @method     ChildBbcode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBbcode matching the query, or a new ChildBbcode object populated from the query conditions when no match is found
 *
 * @method     ChildBbcode findOneByName(string $name) Return the first ChildBbcode filtered by the name column
 * @method     ChildBbcode findOneByBbcodeExpr(string $bbcode_expr) Return the first ChildBbcode filtered by the bbcode_expr column
 * @method     ChildBbcode findOneByHtmlRep(string $html_rep) Return the first ChildBbcode filtered by the html_rep column
 * @method     ChildBbcode findOneByHtmlExpr(string $html_expr) Return the first ChildBbcode filtered by the html_expr column
 * @method     ChildBbcode findOneByBbcodeRep(string $bbcode_rep) Return the first ChildBbcode filtered by the bbcode_rep column *

 * @method     ChildBbcode requirePk($key, ConnectionInterface $con = null) Return the ChildBbcode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBbcode requireOne(ConnectionInterface $con = null) Return the first ChildBbcode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBbcode requireOneByName(string $name) Return the first ChildBbcode filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBbcode requireOneByBbcodeExpr(string $bbcode_expr) Return the first ChildBbcode filtered by the bbcode_expr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBbcode requireOneByHtmlRep(string $html_rep) Return the first ChildBbcode filtered by the html_rep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBbcode requireOneByHtmlExpr(string $html_expr) Return the first ChildBbcode filtered by the html_expr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBbcode requireOneByBbcodeRep(string $bbcode_rep) Return the first ChildBbcode filtered by the bbcode_rep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBbcode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBbcode objects based on current ModelCriteria
 * @method     ChildBbcode[]|ObjectCollection findByName(string $name) Return ChildBbcode objects filtered by the name column
 * @method     ChildBbcode[]|ObjectCollection findByBbcodeExpr(string $bbcode_expr) Return ChildBbcode objects filtered by the bbcode_expr column
 * @method     ChildBbcode[]|ObjectCollection findByHtmlRep(string $html_rep) Return ChildBbcode objects filtered by the html_rep column
 * @method     ChildBbcode[]|ObjectCollection findByHtmlExpr(string $html_expr) Return ChildBbcode objects filtered by the html_expr column
 * @method     ChildBbcode[]|ObjectCollection findByBbcodeRep(string $bbcode_rep) Return ChildBbcode objects filtered by the bbcode_rep column
 * @method     ChildBbcode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BbcodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BbcodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Bbcode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBbcodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBbcodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBbcodeQuery) {
            return $criteria;
        }
        $query = new ChildBbcodeQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBbcode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Bbcode object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Bbcode object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Bbcode object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Bbcode object has no primary key');
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BbcodeTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the bbcode_expr column
     *
     * Example usage:
     * <code>
     * $query->filterByBbcodeExpr('fooValue');   // WHERE bbcode_expr = 'fooValue'
     * $query->filterByBbcodeExpr('%fooValue%'); // WHERE bbcode_expr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bbcodeExpr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function filterByBbcodeExpr($bbcodeExpr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bbcodeExpr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bbcodeExpr)) {
                $bbcodeExpr = str_replace('*', '%', $bbcodeExpr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BbcodeTableMap::COL_BBCODE_EXPR, $bbcodeExpr, $comparison);
    }

    /**
     * Filter the query on the html_rep column
     *
     * Example usage:
     * <code>
     * $query->filterByHtmlRep('fooValue');   // WHERE html_rep = 'fooValue'
     * $query->filterByHtmlRep('%fooValue%'); // WHERE html_rep LIKE '%fooValue%'
     * </code>
     *
     * @param     string $htmlRep The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function filterByHtmlRep($htmlRep = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($htmlRep)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $htmlRep)) {
                $htmlRep = str_replace('*', '%', $htmlRep);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BbcodeTableMap::COL_HTML_REP, $htmlRep, $comparison);
    }

    /**
     * Filter the query on the html_expr column
     *
     * Example usage:
     * <code>
     * $query->filterByHtmlExpr('fooValue');   // WHERE html_expr = 'fooValue'
     * $query->filterByHtmlExpr('%fooValue%'); // WHERE html_expr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $htmlExpr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function filterByHtmlExpr($htmlExpr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($htmlExpr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $htmlExpr)) {
                $htmlExpr = str_replace('*', '%', $htmlExpr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BbcodeTableMap::COL_HTML_EXPR, $htmlExpr, $comparison);
    }

    /**
     * Filter the query on the bbcode_rep column
     *
     * Example usage:
     * <code>
     * $query->filterByBbcodeRep('fooValue');   // WHERE bbcode_rep = 'fooValue'
     * $query->filterByBbcodeRep('%fooValue%'); // WHERE bbcode_rep LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bbcodeRep The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function filterByBbcodeRep($bbcodeRep = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bbcodeRep)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bbcodeRep)) {
                $bbcodeRep = str_replace('*', '%', $bbcodeRep);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BbcodeTableMap::COL_BBCODE_REP, $bbcodeRep, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBbcode $bbcode Object to remove from the list of results
     *
     * @return $this|ChildBbcodeQuery The current query, for fluid interface
     */
    public function prune($bbcode = null)
    {
        if ($bbcode) {
            throw new LogicException('Bbcode object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the bbcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BbcodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BbcodeTableMap::clearInstancePool();
            BbcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BbcodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BbcodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BbcodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BbcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BbcodeQuery
