<?php

namespace Base;

use \SurveyQuestions as ChildSurveyQuestions;
use \SurveyQuestionsQuery as ChildSurveyQuestionsQuery;
use \Exception;
use \PDO;
use Map\SurveyQuestionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'survey_questions' table.
 *
 *
 *
 * @method     ChildSurveyQuestionsQuery orderByQuestionNumber($order = Criteria::ASC) Order by the question_number column
 * @method     ChildSurveyQuestionsQuery orderByQuestion($order = Criteria::ASC) Order by the question column
 * @method     ChildSurveyQuestionsQuery orderByNumOfResponses($order = Criteria::ASC) Order by the num_of_responses column
 * @method     ChildSurveyQuestionsQuery orderByFamily($order = Criteria::ASC) Order by the family column
 *
 * @method     ChildSurveyQuestionsQuery groupByQuestionNumber() Group by the question_number column
 * @method     ChildSurveyQuestionsQuery groupByQuestion() Group by the question column
 * @method     ChildSurveyQuestionsQuery groupByNumOfResponses() Group by the num_of_responses column
 * @method     ChildSurveyQuestionsQuery groupByFamily() Group by the family column
 *
 * @method     ChildSurveyQuestionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSurveyQuestionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSurveyQuestionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSurveyQuestions findOne(ConnectionInterface $con = null) Return the first ChildSurveyQuestions matching the query
 * @method     ChildSurveyQuestions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSurveyQuestions matching the query, or a new ChildSurveyQuestions object populated from the query conditions when no match is found
 *
 * @method     ChildSurveyQuestions findOneByQuestionNumber(int $question_number) Return the first ChildSurveyQuestions filtered by the question_number column
 * @method     ChildSurveyQuestions findOneByQuestion(string $question) Return the first ChildSurveyQuestions filtered by the question column
 * @method     ChildSurveyQuestions findOneByNumOfResponses(int $num_of_responses) Return the first ChildSurveyQuestions filtered by the num_of_responses column
 * @method     ChildSurveyQuestions findOneByFamily(string $family) Return the first ChildSurveyQuestions filtered by the family column *

 * @method     ChildSurveyQuestions requirePk($key, ConnectionInterface $con = null) Return the ChildSurveyQuestions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSurveyQuestions requireOne(ConnectionInterface $con = null) Return the first ChildSurveyQuestions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSurveyQuestions requireOneByQuestionNumber(int $question_number) Return the first ChildSurveyQuestions filtered by the question_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSurveyQuestions requireOneByQuestion(string $question) Return the first ChildSurveyQuestions filtered by the question column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSurveyQuestions requireOneByNumOfResponses(int $num_of_responses) Return the first ChildSurveyQuestions filtered by the num_of_responses column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSurveyQuestions requireOneByFamily(string $family) Return the first ChildSurveyQuestions filtered by the family column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSurveyQuestions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSurveyQuestions objects based on current ModelCriteria
 * @method     ChildSurveyQuestions[]|ObjectCollection findByQuestionNumber(int $question_number) Return ChildSurveyQuestions objects filtered by the question_number column
 * @method     ChildSurveyQuestions[]|ObjectCollection findByQuestion(string $question) Return ChildSurveyQuestions objects filtered by the question column
 * @method     ChildSurveyQuestions[]|ObjectCollection findByNumOfResponses(int $num_of_responses) Return ChildSurveyQuestions objects filtered by the num_of_responses column
 * @method     ChildSurveyQuestions[]|ObjectCollection findByFamily(string $family) Return ChildSurveyQuestions objects filtered by the family column
 * @method     ChildSurveyQuestions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SurveyQuestionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SurveyQuestionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\SurveyQuestions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSurveyQuestionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSurveyQuestionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSurveyQuestionsQuery) {
            return $criteria;
        }
        $query = new ChildSurveyQuestionsQuery();
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
     * @return ChildSurveyQuestions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SurveyQuestionsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SurveyQuestionsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSurveyQuestions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `question_number`, `question`, `num_of_responses`, `family` FROM `survey_questions` WHERE `question_number` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSurveyQuestions $obj */
            $obj = new ChildSurveyQuestions();
            $obj->hydrate($row);
            SurveyQuestionsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSurveyQuestions|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSurveyQuestionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SurveyQuestionsTableMap::COL_QUESTION_NUMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSurveyQuestionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SurveyQuestionsTableMap::COL_QUESTION_NUMBER, $keys, Criteria::IN);
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
     * @return $this|ChildSurveyQuestionsQuery The current query, for fluid interface
     */
    public function filterByQuestionNumber($questionNumber = null, $comparison = null)
    {
        if (is_array($questionNumber)) {
            $useMinMax = false;
            if (isset($questionNumber['min'])) {
                $this->addUsingAlias(SurveyQuestionsTableMap::COL_QUESTION_NUMBER, $questionNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($questionNumber['max'])) {
                $this->addUsingAlias(SurveyQuestionsTableMap::COL_QUESTION_NUMBER, $questionNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SurveyQuestionsTableMap::COL_QUESTION_NUMBER, $questionNumber, $comparison);
    }

    /**
     * Filter the query on the question column
     *
     * Example usage:
     * <code>
     * $query->filterByQuestion('fooValue');   // WHERE question = 'fooValue'
     * $query->filterByQuestion('%fooValue%'); // WHERE question LIKE '%fooValue%'
     * </code>
     *
     * @param     string $question The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSurveyQuestionsQuery The current query, for fluid interface
     */
    public function filterByQuestion($question = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($question)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $question)) {
                $question = str_replace('*', '%', $question);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SurveyQuestionsTableMap::COL_QUESTION, $question, $comparison);
    }

    /**
     * Filter the query on the num_of_responses column
     *
     * Example usage:
     * <code>
     * $query->filterByNumOfResponses(1234); // WHERE num_of_responses = 1234
     * $query->filterByNumOfResponses(array(12, 34)); // WHERE num_of_responses IN (12, 34)
     * $query->filterByNumOfResponses(array('min' => 12)); // WHERE num_of_responses > 12
     * </code>
     *
     * @param     mixed $numOfResponses The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSurveyQuestionsQuery The current query, for fluid interface
     */
    public function filterByNumOfResponses($numOfResponses = null, $comparison = null)
    {
        if (is_array($numOfResponses)) {
            $useMinMax = false;
            if (isset($numOfResponses['min'])) {
                $this->addUsingAlias(SurveyQuestionsTableMap::COL_NUM_OF_RESPONSES, $numOfResponses['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numOfResponses['max'])) {
                $this->addUsingAlias(SurveyQuestionsTableMap::COL_NUM_OF_RESPONSES, $numOfResponses['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SurveyQuestionsTableMap::COL_NUM_OF_RESPONSES, $numOfResponses, $comparison);
    }

    /**
     * Filter the query on the family column
     *
     * Example usage:
     * <code>
     * $query->filterByFamily('fooValue');   // WHERE family = 'fooValue'
     * $query->filterByFamily('%fooValue%'); // WHERE family LIKE '%fooValue%'
     * </code>
     *
     * @param     string $family The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSurveyQuestionsQuery The current query, for fluid interface
     */
    public function filterByFamily($family = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($family)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $family)) {
                $family = str_replace('*', '%', $family);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SurveyQuestionsTableMap::COL_FAMILY, $family, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSurveyQuestions $surveyQuestions Object to remove from the list of results
     *
     * @return $this|ChildSurveyQuestionsQuery The current query, for fluid interface
     */
    public function prune($surveyQuestions = null)
    {
        if ($surveyQuestions) {
            $this->addUsingAlias(SurveyQuestionsTableMap::COL_QUESTION_NUMBER, $surveyQuestions->getQuestionNumber(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the survey_questions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SurveyQuestionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SurveyQuestionsTableMap::clearInstancePool();
            SurveyQuestionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SurveyQuestionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SurveyQuestionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SurveyQuestionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SurveyQuestionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SurveyQuestionsQuery
