<?php

namespace Base;

use \SectReg as ChildSectReg;
use \SectRegQuery as ChildSectRegQuery;
use \Exception;
use Map\SectRegTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'sect_reg' table.
 *
 *
 *
 * @method     ChildSectRegQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSectRegQuery orderByChapter($order = Criteria::ASC) Order by the chapter column
 * @method     ChildSectRegQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSectRegQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildSectRegQuery orderByShirt($order = Criteria::ASC) Order by the shirt column
 * @method     ChildSectRegQuery orderByVeg($order = Criteria::ASC) Order by the veg column
 * @method     ChildSectRegQuery orderByKosher($order = Criteria::ASC) Order by the kosher column
 * @method     ChildSectRegQuery orderByHousing($order = Criteria::ASC) Order by the housing column
 * @method     ChildSectRegQuery orderByHpref($order = Criteria::ASC) Order by the hpref column
 * @method     ChildSectRegQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildSectRegQuery groupByName() Group by the name column
 * @method     ChildSectRegQuery groupByChapter() Group by the chapter column
 * @method     ChildSectRegQuery groupByEmail() Group by the email column
 * @method     ChildSectRegQuery groupByPhone() Group by the phone column
 * @method     ChildSectRegQuery groupByShirt() Group by the shirt column
 * @method     ChildSectRegQuery groupByVeg() Group by the veg column
 * @method     ChildSectRegQuery groupByKosher() Group by the kosher column
 * @method     ChildSectRegQuery groupByHousing() Group by the housing column
 * @method     ChildSectRegQuery groupByHpref() Group by the hpref column
 * @method     ChildSectRegQuery groupByDate() Group by the date column
 *
 * @method     ChildSectRegQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSectRegQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSectRegQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSectReg findOne(ConnectionInterface $con = null) Return the first ChildSectReg matching the query
 * @method     ChildSectReg findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSectReg matching the query, or a new ChildSectReg object populated from the query conditions when no match is found
 *
 * @method     ChildSectReg findOneByName(string $name) Return the first ChildSectReg filtered by the name column
 * @method     ChildSectReg findOneByChapter(string $chapter) Return the first ChildSectReg filtered by the chapter column
 * @method     ChildSectReg findOneByEmail(string $email) Return the first ChildSectReg filtered by the email column
 * @method     ChildSectReg findOneByPhone(string $phone) Return the first ChildSectReg filtered by the phone column
 * @method     ChildSectReg findOneByShirt(string $shirt) Return the first ChildSectReg filtered by the shirt column
 * @method     ChildSectReg findOneByVeg(boolean $veg) Return the first ChildSectReg filtered by the veg column
 * @method     ChildSectReg findOneByKosher(boolean $kosher) Return the first ChildSectReg filtered by the kosher column
 * @method     ChildSectReg findOneByHousing(boolean $housing) Return the first ChildSectReg filtered by the housing column
 * @method     ChildSectReg findOneByHpref(string $hpref) Return the first ChildSectReg filtered by the hpref column
 * @method     ChildSectReg findOneByDate(string $date) Return the first ChildSectReg filtered by the date column *

 * @method     ChildSectReg requirePk($key, ConnectionInterface $con = null) Return the ChildSectReg by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOne(ConnectionInterface $con = null) Return the first ChildSectReg matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSectReg requireOneByName(string $name) Return the first ChildSectReg filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByChapter(string $chapter) Return the first ChildSectReg filtered by the chapter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByEmail(string $email) Return the first ChildSectReg filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByPhone(string $phone) Return the first ChildSectReg filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByShirt(string $shirt) Return the first ChildSectReg filtered by the shirt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByVeg(boolean $veg) Return the first ChildSectReg filtered by the veg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByKosher(boolean $kosher) Return the first ChildSectReg filtered by the kosher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByHousing(boolean $housing) Return the first ChildSectReg filtered by the housing column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByHpref(string $hpref) Return the first ChildSectReg filtered by the hpref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSectReg requireOneByDate(string $date) Return the first ChildSectReg filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSectReg[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSectReg objects based on current ModelCriteria
 * @method     ChildSectReg[]|ObjectCollection findByName(string $name) Return ChildSectReg objects filtered by the name column
 * @method     ChildSectReg[]|ObjectCollection findByChapter(string $chapter) Return ChildSectReg objects filtered by the chapter column
 * @method     ChildSectReg[]|ObjectCollection findByEmail(string $email) Return ChildSectReg objects filtered by the email column
 * @method     ChildSectReg[]|ObjectCollection findByPhone(string $phone) Return ChildSectReg objects filtered by the phone column
 * @method     ChildSectReg[]|ObjectCollection findByShirt(string $shirt) Return ChildSectReg objects filtered by the shirt column
 * @method     ChildSectReg[]|ObjectCollection findByVeg(boolean $veg) Return ChildSectReg objects filtered by the veg column
 * @method     ChildSectReg[]|ObjectCollection findByKosher(boolean $kosher) Return ChildSectReg objects filtered by the kosher column
 * @method     ChildSectReg[]|ObjectCollection findByHousing(boolean $housing) Return ChildSectReg objects filtered by the housing column
 * @method     ChildSectReg[]|ObjectCollection findByHpref(string $hpref) Return ChildSectReg objects filtered by the hpref column
 * @method     ChildSectReg[]|ObjectCollection findByDate(string $date) Return ChildSectReg objects filtered by the date column
 * @method     ChildSectReg[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SectRegQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SectRegQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\SectReg', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSectRegQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSectRegQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSectRegQuery) {
            return $criteria;
        }
        $query = new ChildSectRegQuery();
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
     * @return ChildSectReg|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The SectReg object has no primary key');
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
        throw new LogicException('The SectReg object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The SectReg object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The SectReg object has no primary key');
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
     * @return $this|ChildSectRegQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SectRegTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the chapter column
     *
     * Example usage:
     * <code>
     * $query->filterByChapter('fooValue');   // WHERE chapter = 'fooValue'
     * $query->filterByChapter('%fooValue%'); // WHERE chapter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chapter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByChapter($chapter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chapter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chapter)) {
                $chapter = str_replace('*', '%', $chapter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SectRegTableMap::COL_CHAPTER, $chapter, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SectRegTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SectRegTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the shirt column
     *
     * Example usage:
     * <code>
     * $query->filterByShirt('fooValue');   // WHERE shirt = 'fooValue'
     * $query->filterByShirt('%fooValue%'); // WHERE shirt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shirt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByShirt($shirt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shirt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shirt)) {
                $shirt = str_replace('*', '%', $shirt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SectRegTableMap::COL_SHIRT, $shirt, $comparison);
    }

    /**
     * Filter the query on the veg column
     *
     * Example usage:
     * <code>
     * $query->filterByVeg(true); // WHERE veg = true
     * $query->filterByVeg('yes'); // WHERE veg = true
     * </code>
     *
     * @param     boolean|string $veg The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByVeg($veg = null, $comparison = null)
    {
        if (is_string($veg)) {
            $veg = in_array(strtolower($veg), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SectRegTableMap::COL_VEG, $veg, $comparison);
    }

    /**
     * Filter the query on the kosher column
     *
     * Example usage:
     * <code>
     * $query->filterByKosher(true); // WHERE kosher = true
     * $query->filterByKosher('yes'); // WHERE kosher = true
     * </code>
     *
     * @param     boolean|string $kosher The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByKosher($kosher = null, $comparison = null)
    {
        if (is_string($kosher)) {
            $kosher = in_array(strtolower($kosher), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SectRegTableMap::COL_KOSHER, $kosher, $comparison);
    }

    /**
     * Filter the query on the housing column
     *
     * Example usage:
     * <code>
     * $query->filterByHousing(true); // WHERE housing = true
     * $query->filterByHousing('yes'); // WHERE housing = true
     * </code>
     *
     * @param     boolean|string $housing The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByHousing($housing = null, $comparison = null)
    {
        if (is_string($housing)) {
            $housing = in_array(strtolower($housing), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SectRegTableMap::COL_HOUSING, $housing, $comparison);
    }

    /**
     * Filter the query on the hpref column
     *
     * Example usage:
     * <code>
     * $query->filterByHpref('fooValue');   // WHERE hpref = 'fooValue'
     * $query->filterByHpref('%fooValue%'); // WHERE hpref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hpref The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByHpref($hpref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hpref)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hpref)) {
                $hpref = str_replace('*', '%', $hpref);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SectRegTableMap::COL_HPREF, $hpref, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(SectRegTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(SectRegTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SectRegTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSectReg $sectReg Object to remove from the list of results
     *
     * @return $this|ChildSectRegQuery The current query, for fluid interface
     */
    public function prune($sectReg = null)
    {
        if ($sectReg) {
            throw new LogicException('SectReg object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the sect_reg table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SectRegTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SectRegTableMap::clearInstancePool();
            SectRegTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SectRegTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SectRegTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SectRegTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SectRegTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SectRegQuery
