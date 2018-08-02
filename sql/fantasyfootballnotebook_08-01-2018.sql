<script type="text/javascript">window.close();</script>

CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position` enum('QB','RB','WR','TE','K','DEF') NOT NULL,
  `team` enum('ARI','ATL','BAL','BUF','CAR','CHI','CIN','CLE','DAL','DEN','DET','GB','HOU','IND','JAX','KC','LAC','LAR','MIA','MIN','NE','NO','NYG','NYJ','OAK','PHI','PIT','SEA','SF','TB','TEN','WAS') NOT NULL,
  `age` int(11) NOT NULL,
  `dateofarticle` date NOT NULL,
  `projdraftround` int(11) NOT NULL,
  `injsus` enum('1','2','3','4','5','6','7','8','9','10','N/A') NOT NULL,
  `href` text NOT NULL,
  `newssrc` text NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Available','Drafted') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;


INSERT INTO players VALUES
("103","Tom Brady","QB","NE","39","2018-08-01","6","1","https://...","ESPN","fd","2018-07-31 23:38:59","Available");


