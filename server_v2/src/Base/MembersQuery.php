<?php

namespace Base;

use \Members as ChildMembers;
use \MembersQuery as ChildMembersQuery;
use \Exception;
use Map\MembersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'members' table.
 *
 *
 *
 * @method     ChildMembersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMembersQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildMembersQuery orderByMiddleName($order = Criteria::ASC) Order by the middle_name column
 * @method     ChildMembersQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildMembersQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildMembersQuery orderByMailList($order = Criteria::ASC) Order by the mail_list column
 * @method     ChildMembersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildMembersQuery orderByAim($order = Criteria::ASC) Order by the aim column
 * @method     ChildMembersQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method     ChildMembersQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildMembersQuery orderByPermAddress($order = Criteria::ASC) Order by the perm_address column
 * @method     ChildMembersQuery orderByTempAddress($order = Criteria::ASC) Order by the temp_address column
 * @method     ChildMembersQuery orderByAvatar($order = Criteria::ASC) Order by the avatar column
 * @method     ChildMembersQuery orderBySignature($order = Criteria::ASC) Order by the signature column
 * @method     ChildMembersQuery orderByClass($order = Criteria::ASC) Order by the class column
 * @method     ChildMembersQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildMembersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildMembersQuery orderByFamily($order = Criteria::ASC) Order by the family column
 * @method     ChildMembersQuery orderByBirthday($order = Criteria::ASC) Order by the birthday column
 * @method     ChildMembersQuery orderByShirtSize($order = Criteria::ASC) Order by the shirt_size column
 * @method     ChildMembersQuery orderByTotalService($order = Criteria::ASC) Order by the total_service column
 * @method     ChildMembersQuery orderByTotalFellowship($order = Criteria::ASC) Order by the total_fellowship column
 * @method     ChildMembersQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildMembersQuery orderByFeesOwed($order = Criteria::ASC) Order by the fees_owed column
 * @method     ChildMembersQuery orderByEmailList($order = Criteria::ASC) Order by the email_list column
 * @method     ChildMembersQuery orderByReminder($order = Criteria::ASC) Order by the reminder column
 *
 * @method     ChildMembersQuery groupById() Group by the id column
 * @method     ChildMembersQuery groupByFirstName() Group by the first_name column
 * @method     ChildMembersQuery groupByMiddleName() Group by the middle_name column
 * @method     ChildMembersQuery groupByLastName() Group by the last_name column
 * @method     ChildMembersQuery groupByPosition() Group by the position column
 * @method     ChildMembersQuery groupByMailList() Group by the mail_list column
 * @method     ChildMembersQuery groupByEmail() Group by the email column
 * @method     ChildMembersQuery groupByAim() Group by the aim column
 * @method     ChildMembersQuery groupByWebsite() Group by the website column
 * @method     ChildMembersQuery groupByPhone() Group by the phone column
 * @method     ChildMembersQuery groupByPermAddress() Group by the perm_address column
 * @method     ChildMembersQuery groupByTempAddress() Group by the temp_address column
 * @method     ChildMembersQuery groupByAvatar() Group by the avatar column
 * @method     ChildMembersQuery groupBySignature() Group by the signature column
 * @method     ChildMembersQuery groupByClass() Group by the class column
 * @method     ChildMembersQuery groupByUsername() Group by the username column
 * @method     ChildMembersQuery groupByPassword() Group by the password column
 * @method     ChildMembersQuery groupByFamily() Group by the family column
 * @method     ChildMembersQuery groupByBirthday() Group by the birthday column
 * @method     ChildMembersQuery groupByShirtSize() Group by the shirt_size column
 * @method     ChildMembersQuery groupByTotalService() Group by the total_service column
 * @method     ChildMembersQuery groupByTotalFellowship() Group by the total_fellowship column
 * @method     ChildMembersQuery groupByNotes() Group by the notes column
 * @method     ChildMembersQuery groupByFeesOwed() Group by the fees_owed column
 * @method     ChildMembersQuery groupByEmailList() Group by the email_list column
 * @method     ChildMembersQuery groupByReminder() Group by the reminder column
 *
 * @method     ChildMembersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMembersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMembersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMembers findOne(ConnectionInterface $con = null) Return the first ChildMembers matching the query
 * @method     ChildMembers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMembers matching the query, or a new ChildMembers object populated from the query conditions when no match is found
 *
 * @method     ChildMembers findOneById(int $id) Return the first ChildMembers filtered by the id column
 * @method     ChildMembers findOneByFirstName(string $first_name) Return the first ChildMembers filtered by the first_name column
 * @method     ChildMembers findOneByMiddleName(string $middle_name) Return the first ChildMembers filtered by the middle_name column
 * @method     ChildMembers findOneByLastName(string $last_name) Return the first ChildMembers filtered by the last_name column
 * @method     ChildMembers findOneByPosition(int $position) Return the first ChildMembers filtered by the position column
 * @method     ChildMembers findOneByMailList(boolean $mail_list) Return the first ChildMembers filtered by the mail_list column
 * @method     ChildMembers findOneByEmail(string $email) Return the first ChildMembers filtered by the email column
 * @method     ChildMembers findOneByAim(string $aim) Return the first ChildMembers filtered by the aim column
 * @method     ChildMembers findOneByWebsite(string $website) Return the first ChildMembers filtered by the website column
 * @method     ChildMembers findOneByPhone(string $phone) Return the first ChildMembers filtered by the phone column
 * @method     ChildMembers findOneByPermAddress(string $perm_address) Return the first ChildMembers filtered by the perm_address column
 * @method     ChildMembers findOneByTempAddress(string $temp_address) Return the first ChildMembers filtered by the temp_address column
 * @method     ChildMembers findOneByAvatar(string $avatar) Return the first ChildMembers filtered by the avatar column
 * @method     ChildMembers findOneBySignature(string $signature) Return the first ChildMembers filtered by the signature column
 * @method     ChildMembers findOneByClass(string $class) Return the first ChildMembers filtered by the class column
 * @method     ChildMembers findOneByUsername(string $username) Return the first ChildMembers filtered by the username column
 * @method     ChildMembers findOneByPassword(string $password) Return the first ChildMembers filtered by the password column
 * @method     ChildMembers findOneByFamily(string $family) Return the first ChildMembers filtered by the family column
 * @method     ChildMembers findOneByBirthday(int $birthday) Return the first ChildMembers filtered by the birthday column
 * @method     ChildMembers findOneByShirtSize(string $shirt_size) Return the first ChildMembers filtered by the shirt_size column
 * @method     ChildMembers findOneByTotalService(double $total_service) Return the first ChildMembers filtered by the total_service column
 * @method     ChildMembers findOneByTotalFellowship(double $total_fellowship) Return the first ChildMembers filtered by the total_fellowship column
 * @method     ChildMembers findOneByNotes(string $notes) Return the first ChildMembers filtered by the notes column
 * @method     ChildMembers findOneByFeesOwed(double $fees_owed) Return the first ChildMembers filtered by the fees_owed column
 * @method     ChildMembers findOneByEmailList(boolean $email_list) Return the first ChildMembers filtered by the email_list column
 * @method     ChildMembers findOneByReminder(int $reminder) Return the first ChildMembers filtered by the reminder column *

 * @method     ChildMembers requirePk($key, ConnectionInterface $con = null) Return the ChildMembers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOne(ConnectionInterface $con = null) Return the first ChildMembers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMembers requireOneById(int $id) Return the first ChildMembers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByFirstName(string $first_name) Return the first ChildMembers filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByMiddleName(string $middle_name) Return the first ChildMembers filtered by the middle_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByLastName(string $last_name) Return the first ChildMembers filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByPosition(int $position) Return the first ChildMembers filtered by the position column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByMailList(boolean $mail_list) Return the first ChildMembers filtered by the mail_list column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByEmail(string $email) Return the first ChildMembers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByAim(string $aim) Return the first ChildMembers filtered by the aim column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByWebsite(string $website) Return the first ChildMembers filtered by the website column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByPhone(string $phone) Return the first ChildMembers filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByPermAddress(string $perm_address) Return the first ChildMembers filtered by the perm_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByTempAddress(string $temp_address) Return the first ChildMembers filtered by the temp_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByAvatar(string $avatar) Return the first ChildMembers filtered by the avatar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneBySignature(string $signature) Return the first ChildMembers filtered by the signature column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByClass(string $class) Return the first ChildMembers filtered by the class column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByUsername(string $username) Return the first ChildMembers filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByPassword(string $password) Return the first ChildMembers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByFamily(string $family) Return the first ChildMembers filtered by the family column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByBirthday(int $birthday) Return the first ChildMembers filtered by the birthday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByShirtSize(string $shirt_size) Return the first ChildMembers filtered by the shirt_size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByTotalService(double $total_service) Return the first ChildMembers filtered by the total_service column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByTotalFellowship(double $total_fellowship) Return the first ChildMembers filtered by the total_fellowship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByNotes(string $notes) Return the first ChildMembers filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByFeesOwed(double $fees_owed) Return the first ChildMembers filtered by the fees_owed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByEmailList(boolean $email_list) Return the first ChildMembers filtered by the email_list column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMembers requireOneByReminder(int $reminder) Return the first ChildMembers filtered by the reminder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMembers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMembers objects based on current ModelCriteria
 * @method     ChildMembers[]|ObjectCollection findById(int $id) Return ChildMembers objects filtered by the id column
 * @method     ChildMembers[]|ObjectCollection findByFirstName(string $first_name) Return ChildMembers objects filtered by the first_name column
 * @method     ChildMembers[]|ObjectCollection findByMiddleName(string $middle_name) Return ChildMembers objects filtered by the middle_name column
 * @method     ChildMembers[]|ObjectCollection findByLastName(string $last_name) Return ChildMembers objects filtered by the last_name column
 * @method     ChildMembers[]|ObjectCollection findByPosition(int $position) Return ChildMembers objects filtered by the position column
 * @method     ChildMembers[]|ObjectCollection findByMailList(boolean $mail_list) Return ChildMembers objects filtered by the mail_list column
 * @method     ChildMembers[]|ObjectCollection findByEmail(string $email) Return ChildMembers objects filtered by the email column
 * @method     ChildMembers[]|ObjectCollection findByAim(string $aim) Return ChildMembers objects filtered by the aim column
 * @method     ChildMembers[]|ObjectCollection findByWebsite(string $website) Return ChildMembers objects filtered by the website column
 * @method     ChildMembers[]|ObjectCollection findByPhone(string $phone) Return ChildMembers objects filtered by the phone column
 * @method     ChildMembers[]|ObjectCollection findByPermAddress(string $perm_address) Return ChildMembers objects filtered by the perm_address column
 * @method     ChildMembers[]|ObjectCollection findByTempAddress(string $temp_address) Return ChildMembers objects filtered by the temp_address column
 * @method     ChildMembers[]|ObjectCollection findByAvatar(string $avatar) Return ChildMembers objects filtered by the avatar column
 * @method     ChildMembers[]|ObjectCollection findBySignature(string $signature) Return ChildMembers objects filtered by the signature column
 * @method     ChildMembers[]|ObjectCollection findByClass(string $class) Return ChildMembers objects filtered by the class column
 * @method     ChildMembers[]|ObjectCollection findByUsername(string $username) Return ChildMembers objects filtered by the username column
 * @method     ChildMembers[]|ObjectCollection findByPassword(string $password) Return ChildMembers objects filtered by the password column
 * @method     ChildMembers[]|ObjectCollection findByFamily(string $family) Return ChildMembers objects filtered by the family column
 * @method     ChildMembers[]|ObjectCollection findByBirthday(int $birthday) Return ChildMembers objects filtered by the birthday column
 * @method     ChildMembers[]|ObjectCollection findByShirtSize(string $shirt_size) Return ChildMembers objects filtered by the shirt_size column
 * @method     ChildMembers[]|ObjectCollection findByTotalService(double $total_service) Return ChildMembers objects filtered by the total_service column
 * @method     ChildMembers[]|ObjectCollection findByTotalFellowship(double $total_fellowship) Return ChildMembers objects filtered by the total_fellowship column
 * @method     ChildMembers[]|ObjectCollection findByNotes(string $notes) Return ChildMembers objects filtered by the notes column
 * @method     ChildMembers[]|ObjectCollection findByFeesOwed(double $fees_owed) Return ChildMembers objects filtered by the fees_owed column
 * @method     ChildMembers[]|ObjectCollection findByEmailList(boolean $email_list) Return ChildMembers objects filtered by the email_list column
 * @method     ChildMembers[]|ObjectCollection findByReminder(int $reminder) Return ChildMembers objects filtered by the reminder column
 * @method     ChildMembers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MembersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MembersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'aphio', $modelName = '\\Members', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMembersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMembersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMembersQuery) {
            return $criteria;
        }
        $query = new ChildMembersQuery();
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
     * @return ChildMembers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Members object has no primary key');
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
        throw new LogicException('The Members object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Members object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Members object has no primary key');
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the middle_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMiddleName('fooValue');   // WHERE middle_name = 'fooValue'
     * $query->filterByMiddleName('%fooValue%'); // WHERE middle_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $middleName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByMiddleName($middleName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($middleName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $middleName)) {
                $middleName = str_replace('*', '%', $middleName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_MIDDLE_NAME, $middleName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition(1234); // WHERE position = 1234
     * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
     * $query->filterByPosition(array('min' => 12)); // WHERE position > 12
     * </code>
     *
     * @param     mixed $position The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (is_array($position)) {
            $useMinMax = false;
            if (isset($position['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_POSITION, $position['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($position['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_POSITION, $position['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_POSITION, $position, $comparison);
    }

    /**
     * Filter the query on the mail_list column
     *
     * Example usage:
     * <code>
     * $query->filterByMailList(true); // WHERE mail_list = true
     * $query->filterByMailList('yes'); // WHERE mail_list = true
     * </code>
     *
     * @param     boolean|string $mailList The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByMailList($mailList = null, $comparison = null)
    {
        if (is_string($mailList)) {
            $mailList = in_array(strtolower($mailList), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(MembersTableMap::COL_MAIL_LIST, $mailList, $comparison);
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
     * @return $this|ChildMembersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MembersTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the aim column
     *
     * Example usage:
     * <code>
     * $query->filterByAim('fooValue');   // WHERE aim = 'fooValue'
     * $query->filterByAim('%fooValue%'); // WHERE aim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aim The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByAim($aim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aim)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $aim)) {
                $aim = str_replace('*', '%', $aim);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_AIM, $aim, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_WEBSITE, $website, $comparison);
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
     * @return $this|ChildMembersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MembersTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the perm_address column
     *
     * Example usage:
     * <code>
     * $query->filterByPermAddress('fooValue');   // WHERE perm_address = 'fooValue'
     * $query->filterByPermAddress('%fooValue%'); // WHERE perm_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $permAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPermAddress($permAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($permAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $permAddress)) {
                $permAddress = str_replace('*', '%', $permAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_PERM_ADDRESS, $permAddress, $comparison);
    }

    /**
     * Filter the query on the temp_address column
     *
     * Example usage:
     * <code>
     * $query->filterByTempAddress('fooValue');   // WHERE temp_address = 'fooValue'
     * $query->filterByTempAddress('%fooValue%'); // WHERE temp_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tempAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByTempAddress($tempAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tempAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tempAddress)) {
                $tempAddress = str_replace('*', '%', $tempAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_TEMP_ADDRESS, $tempAddress, $comparison);
    }

    /**
     * Filter the query on the avatar column
     *
     * Example usage:
     * <code>
     * $query->filterByAvatar('fooValue');   // WHERE avatar = 'fooValue'
     * $query->filterByAvatar('%fooValue%'); // WHERE avatar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $avatar The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByAvatar($avatar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($avatar)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $avatar)) {
                $avatar = str_replace('*', '%', $avatar);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_AVATAR, $avatar, $comparison);
    }

    /**
     * Filter the query on the signature column
     *
     * Example usage:
     * <code>
     * $query->filterBySignature('fooValue');   // WHERE signature = 'fooValue'
     * $query->filterBySignature('%fooValue%'); // WHERE signature LIKE '%fooValue%'
     * </code>
     *
     * @param     string $signature The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterBySignature($signature = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($signature)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $signature)) {
                $signature = str_replace('*', '%', $signature);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_SIGNATURE, $signature, $comparison);
    }

    /**
     * Filter the query on the class column
     *
     * Example usage:
     * <code>
     * $query->filterByClass('fooValue');   // WHERE class = 'fooValue'
     * $query->filterByClass('%fooValue%'); // WHERE class LIKE '%fooValue%'
     * </code>
     *
     * @param     string $class The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByClass($class = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($class)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $class)) {
                $class = str_replace('*', '%', $class);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_CLASS, $class, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_PASSWORD, $password, $comparison);
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
     * @return $this|ChildMembersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MembersTableMap::COL_FAMILY, $family, $comparison);
    }

    /**
     * Filter the query on the birthday column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthday(1234); // WHERE birthday = 1234
     * $query->filterByBirthday(array(12, 34)); // WHERE birthday IN (12, 34)
     * $query->filterByBirthday(array('min' => 12)); // WHERE birthday > 12
     * </code>
     *
     * @param     mixed $birthday The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByBirthday($birthday = null, $comparison = null)
    {
        if (is_array($birthday)) {
            $useMinMax = false;
            if (isset($birthday['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_BIRTHDAY, $birthday['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthday['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_BIRTHDAY, $birthday['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_BIRTHDAY, $birthday, $comparison);
    }

    /**
     * Filter the query on the shirt_size column
     *
     * Example usage:
     * <code>
     * $query->filterByShirtSize('fooValue');   // WHERE shirt_size = 'fooValue'
     * $query->filterByShirtSize('%fooValue%'); // WHERE shirt_size LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shirtSize The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByShirtSize($shirtSize = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shirtSize)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shirtSize)) {
                $shirtSize = str_replace('*', '%', $shirtSize);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_SHIRT_SIZE, $shirtSize, $comparison);
    }

    /**
     * Filter the query on the total_service column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalService(1234); // WHERE total_service = 1234
     * $query->filterByTotalService(array(12, 34)); // WHERE total_service IN (12, 34)
     * $query->filterByTotalService(array('min' => 12)); // WHERE total_service > 12
     * </code>
     *
     * @param     mixed $totalService The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByTotalService($totalService = null, $comparison = null)
    {
        if (is_array($totalService)) {
            $useMinMax = false;
            if (isset($totalService['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_TOTAL_SERVICE, $totalService['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalService['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_TOTAL_SERVICE, $totalService['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_TOTAL_SERVICE, $totalService, $comparison);
    }

    /**
     * Filter the query on the total_fellowship column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalFellowship(1234); // WHERE total_fellowship = 1234
     * $query->filterByTotalFellowship(array(12, 34)); // WHERE total_fellowship IN (12, 34)
     * $query->filterByTotalFellowship(array('min' => 12)); // WHERE total_fellowship > 12
     * </code>
     *
     * @param     mixed $totalFellowship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByTotalFellowship($totalFellowship = null, $comparison = null)
    {
        if (is_array($totalFellowship)) {
            $useMinMax = false;
            if (isset($totalFellowship['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_TOTAL_FELLOWSHIP, $totalFellowship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalFellowship['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_TOTAL_FELLOWSHIP, $totalFellowship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_TOTAL_FELLOWSHIP, $totalFellowship, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notes)) {
                $notes = str_replace('*', '%', $notes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the fees_owed column
     *
     * Example usage:
     * <code>
     * $query->filterByFeesOwed(1234); // WHERE fees_owed = 1234
     * $query->filterByFeesOwed(array(12, 34)); // WHERE fees_owed IN (12, 34)
     * $query->filterByFeesOwed(array('min' => 12)); // WHERE fees_owed > 12
     * </code>
     *
     * @param     mixed $feesOwed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByFeesOwed($feesOwed = null, $comparison = null)
    {
        if (is_array($feesOwed)) {
            $useMinMax = false;
            if (isset($feesOwed['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_FEES_OWED, $feesOwed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feesOwed['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_FEES_OWED, $feesOwed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_FEES_OWED, $feesOwed, $comparison);
    }

    /**
     * Filter the query on the email_list column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailList(true); // WHERE email_list = true
     * $query->filterByEmailList('yes'); // WHERE email_list = true
     * </code>
     *
     * @param     boolean|string $emailList The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByEmailList($emailList = null, $comparison = null)
    {
        if (is_string($emailList)) {
            $emailList = in_array(strtolower($emailList), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(MembersTableMap::COL_EMAIL_LIST, $emailList, $comparison);
    }

    /**
     * Filter the query on the reminder column
     *
     * Example usage:
     * <code>
     * $query->filterByReminder(1234); // WHERE reminder = 1234
     * $query->filterByReminder(array(12, 34)); // WHERE reminder IN (12, 34)
     * $query->filterByReminder(array('min' => 12)); // WHERE reminder > 12
     * </code>
     *
     * @param     mixed $reminder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function filterByReminder($reminder = null, $comparison = null)
    {
        if (is_array($reminder)) {
            $useMinMax = false;
            if (isset($reminder['min'])) {
                $this->addUsingAlias(MembersTableMap::COL_REMINDER, $reminder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reminder['max'])) {
                $this->addUsingAlias(MembersTableMap::COL_REMINDER, $reminder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MembersTableMap::COL_REMINDER, $reminder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMembers $members Object to remove from the list of results
     *
     * @return $this|ChildMembersQuery The current query, for fluid interface
     */
    public function prune($members = null)
    {
        if ($members) {
            throw new LogicException('Members object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the members table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MembersTableMap::clearInstancePool();
            MembersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MembersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MembersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MembersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MembersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MembersQuery
