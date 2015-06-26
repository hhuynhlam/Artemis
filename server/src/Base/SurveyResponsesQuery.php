<?php

namespace Base;

use \SurveyResponses as ChildSurveyResponses;
use \SurveyResponsesQuery as ChildSurveyResponsesQuery;
use \Exception;
use Map\SurveyResponsesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'survey_responses' table.
 *
 *
 *
 * @method     ChildSurveyResponsesQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildSurveyResponsesQuery orderByQuestionNumber($order = Criteria::ASC) Order by the question_number column
 * @method     ChildSurveyResponsesQuery orderByResponse($order = Criteria::ASC) Order by the response column
 *
 * @method     ChildSurveyResponsesQuery groupByUserId() Group by the user_id column
 * @method     ChildSurveyResponsesQuery groupByQuestionNumber() Group by the question_number column
 * @method     ChildSurveyResponsesQuery groupByResponse() Group by the response column
 *
 * @method     ChildSurveyResponsesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSurveyResponsesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSurveyResponsesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSurveyResponses findOne(ConnectionInterface $con = null) Return the first ChildSurveyResponses matching the query
 * @method     ChildSurveyResponses findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSurveyResponses matching the query, or a new ChildSurveyResponses object populated from the query conditions when no match is found
 *
 * @method     ChildSurveyResponses findOneByUserId(int $user_id) Return the first ChildSurveyResponses filtered by the user_id column
 * @method     ChildSurveyResponses findOneByQuestionNumber(int $question_number) Return the first ChildSurveyResponses filtered by the question_number column
 * @method     ChildSurveyResponses findOneByResponse(string $response) Return the first ChildSurveyResponses filtered by the response column *

 * @method     ChildSurveyResponses requirePk($key, ConnectionInterface $con = null) Return the ChildSurveyResponses by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSurveyResponses requireOne(ConnectionInterface $con = null) Return the first ChildSurveyResponses matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSurveyResponses requireOneByUserId(int $user_id) Return the first ChildSurveyResponses filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSurveyResponses requireOneByQuestionNumber(int $question_number) Return the first ChildSurveyResponses filtered by the question_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSurveyResponses requireOneByResponse(string $response) Return the first ChildSurveyResponses filtered by the response column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSurveyResponses[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSurveyResponses objects based on current ModelCriteria
 * @method     ChildSurveyResponses[]|ObjectCollection findByUserId(int $user_id) Return ChildSurveyResponses objects filtered by the user_id column
 * @method     ChildSurveyResponses[]|ObjectCollection findByQuestionNumber(int $question_number) Return ChildSurveyResponses objects filtered by the question_number column
 * @method     ChildSurveyResponses[]|ObjectCollection findByResponse(string $response) Return ChildSurveyResponses objects filtered by the response column
 * @method     ChildSurveyResponses[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SurveyResponsesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SurveyResponsesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\SurveyResponses', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSurveyResponsesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSurveyResponsesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSurveyResponsesQuery) {
            return $criteria;
        }
        $query = new ChildSurveyResponsesQuery();
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
     * @return ChildSurveyResponses|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The SurveyResponses object has no primary key');
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
        throw new LogicException('The SurveyResponses object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSurveyResponsesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The SurveyResponses object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSurveyResponsesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The SurveyResponses object has no primary key');
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSurveyResponsesQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(SurveyResponsesTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(SurveyResponsesTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SurveyResponsesTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the question_number column
     *
     * Example usage:
     * <code>
     * $query->filterByQuestionNumber(1234); // WHERE question_number = 1234
     * $query->filterByQuestionNumber(array(12, 34)); // WHERE question_number IN (12, 34)
     * $query->filterByQuestionNumber(array('min' => 12)); // WHERE question_number > 12
     * </code>
     *
     * @param     mixed $questionNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSurveyResponsesQuery The current query, for fluid interface
     */
    public function filterByQuestionNumber($questionNumber = null, $comparison = null)
    {
        if (is_array($questionNumber)) {
            $useMinMax = false;
            if (isset($questionNumber['min'])) {
                $this->addUsingAlias(SurveyResponsesTableMap::COL_QUESTION_NUMBER, $questionNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($questionNumber['max'])) {
                $this->addUsingAlias(SurveyResponsesTableMap::COL_QUESTION_NUMBER, $questionNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SurveyResponsesTableMap::COL_QUESTION_NUMBER, $questionNumber, $comparison);
    }

    /**
     * Filter the query on the response column
     *
     * Example usage:
     * <code>
     * $query->filterByResponse('fooValue');   // WHERE response = 'fooValue'
     * $query->filterByResponse('%fooValue%'); // WHERE response LIKE '%fooValue%'
     * </code>
     *
     * @param     string $response The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSurveyResponsesQuery The current query, for fluid interface
     */
    public function filterByResponse($response = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($response)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $response)) {
                $response = str_replace('*', '%', $response);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SurveyResponsesTableMap::COL_RESPONSE, $response, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSurveyResponses $surveyResponses Object to remove from the list of results
     *
     * @return $this|ChildSurveyResponsesQuery The current query, for fluid interface
     */
    public function prune($surveyResponses = null)
    {
        if ($surveyResponses) {
            throw new LogicException('SurveyResponses object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the survey_responses table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SurveyResponsesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SurveyResponsesTableMap::clearInstancePool();
            SurveyResponsesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SurveyResponsesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SurveyResponsesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SurveyResponsesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SurveyResponsesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SurveyResponsesQuery
